<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle, WithEvents
{
    protected $dariTanggal;
    protected $sampaiTanggal;
    protected $totalPendapatan;
    protected $totalTransaksi;

    public function __construct($dariTanggal, $sampaiTanggal)
    {
        $this->dariTanggal    = $dariTanggal;
        $this->sampaiTanggal  = $sampaiTanggal;
    }

    public function title(): string
    {
        return 'Laporan';
    }

    public function collection(): Collection
    {
        $data = Transaksi::with(['pelanggan', 'detailTransaksi.layanan'])
            ->whereDate('tanggal_masuk', '>=', $this->dariTanggal)
            ->whereDate('tanggal_masuk', '<=', $this->sampaiTanggal)
            ->orderBy('tanggal_masuk')
            ->get();

        $this->totalTransaksi  = $data->count();
        $this->totalPendapatan = $data->where('status_pembayaran', 'lunas')->sum('total');

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Transaksi',
            'Tanggal',
            'Pelanggan',
            'Layanan',
            'Total',
            'Metode Bayar',
            'Status Bayar',
            'Status Laundry',
        ];
    }

    public function map($transaksi): array
    {
        static $no = 0;
        $no++;

        $layananList = $transaksi->detailTransaksi->map(function ($detail) {
            return $detail->layanan->nama_layanan ?? '-';
        })->implode(', ');

        $metode = match($transaksi->metode_pembayaran ?? 'tunai') {
            'transfer' => 'Transfer',
            'qris'     => 'QRIS',
            default    => 'Tunai',
        };

        return [
            $no,
            $transaksi->kode_transaksi ?? '-',
            $transaksi->tanggal_masuk->format('d/m/Y H:i'),
            $transaksi->pelanggan->nama_pelanggan ?? '-',
            $layananList,
            $transaksi->total,
            $metode,
            $transaksi->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas',
            ucfirst($transaksi->status_laundry),
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 14,
            'C' => 18,
            'D' => 20,
            'E' => 40,
            'F' => 16,
            'G' => 14,
            'H' => 14,
            'I' => 16,
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            // Header row
            4 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 11],
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '07549A']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $dari    = $this->dariTanggal;
                $sampai  = $this->sampaiTanggal;
                $lastRow = 4 + ($this->totalTransaksi ?? 0);

                // ── Judul laporan (baris 1-3) ──
                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', 'LAUNDRIA - Laporan Transaksi');
                $sheet->getStyle('A1')->applyFromArray([
                    'font'      => ['bold' => true, 'size' => 14, 'color' => ['rgb' => '063B70']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->mergeCells('A2:I2');
                $sheet->setCellValue('A2', 'Periode: ' . date('d/m/Y', strtotime($dari)) . ' s/d ' . date('d/m/Y', strtotime($sampai)));
                $sheet->getStyle('A2')->applyFromArray([
                    'font'      => ['size' => 11, 'color' => ['rgb' => '64748B']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->mergeCells('A3:I3');
                $sheet->setCellValue('A3', 'Dicetak: ' . now()->format('d/m/Y H:i'));
                $sheet->getStyle('A3')->applyFromArray([
                    'font'      => ['size' => 10, 'italic' => true, 'color' => ['rgb' => '94A3B8']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                // Tinggi baris judul
                $sheet->getRowDimension(1)->setRowHeight(24);
                $sheet->getRowDimension(2)->setRowHeight(18);
                $sheet->getRowDimension(3)->setRowHeight(14);
                $sheet->getRowDimension(4)->setRowHeight(20);

                // ── Format kolom Total sebagai Rupiah ──
                $sheet->getStyle('F5:F' . $lastRow)
                    ->getNumberFormat()
                    ->setFormatCode('"Rp"#,##0');

                // ── Border tabel ──
                if ($lastRow >= 5) {
                    $sheet->getStyle('A4:I' . $lastRow)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color'       => ['rgb' => 'E5E7EB'],
                            ],
                        ],
                    ]);
                    // Border luar lebih tebal
                    $sheet->getStyle('A4:I' . $lastRow)->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => Border::BORDER_MEDIUM,
                                'color'       => ['rgb' => '07549A'],
                            ],
                        ],
                    ]);
                }

                // ── Warna baris alternating ──
                for ($row = 5; $row <= $lastRow; $row++) {
                    if ($row % 2 == 0) {
                        $sheet->getStyle('A' . $row . ':I' . $row)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'F8FAFC']],
                        ]);
                    }
                }

                // ── Ringkasan di bawah tabel ──
                $summaryRow = $lastRow + 2;
                $sheet->mergeCells('A' . $summaryRow . ':E' . $summaryRow);
                $sheet->setCellValue('A' . $summaryRow, 'Total Transaksi: ' . ($this->totalTransaksi ?? 0));
                $sheet->getStyle('A' . $summaryRow)->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['rgb' => '063B70']],
                ]);

                $sheet->mergeCells('F' . $summaryRow . ':I' . $summaryRow);
                $sheet->setCellValue('F' . $summaryRow, 'Total Pendapatan (Lunas): Rp' . number_format($this->totalPendapatan ?? 0, 0, ',', '.'));
                $sheet->getStyle('F' . $summaryRow)->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['rgb' => '16A34A']],
                ]);

                // Freeze header
                $sheet->freezePane('A5');
            },
        ];
    }
}
