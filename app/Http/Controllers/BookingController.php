<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function konfirmasi($kode)
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $transaksi = Transaksi::with('detailTransaksi.layanan')
            ->where('kode_transaksi', $kode)
            ->where('id_pelanggan', $pelanggan->id_pelanggan)
            ->firstOrFail();

        return view('pelanggan.konfirmasi', compact('transaksi'));
    }

    public function lacakForm()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $transaksiTerbaru = Transaksi::where('id_pelanggan', $pelanggan->id_pelanggan)
            ->latest('tanggal_masuk')
            ->first();

        // Kalau ada pesanan, langsung redirect ke halaman lacak pesanan terbaru
        if ($transaksiTerbaru) {
            return redirect()->route('pelanggan.lacak', $transaksiTerbaru->kode_transaksi);
        }

        // Kalau belum ada pesanan, tampilkan halaman kosong
        $transaksi = collect();
        return view('pelanggan.lacak-form', compact('transaksi'));
    }

    public function lacak($kode)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $transaksi = Transaksi::with('detailTransaksi.layanan')
            ->where('kode_transaksi', $kode)
            ->where('id_pelanggan', $pelanggan->id_pelanggan)
            ->firstOrFail();

        return view('pelanggan.lacak', compact('transaksi'));
    }

    public function dashboard()
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $transaksi = Transaksi::with('detailTransaksi.layanan')
            ->where('id_pelanggan', $pelanggan->id_pelanggan)
            ->orderByDesc('id_transaksi')
            ->get();

        return view('pelanggan.dashboard', compact('transaksi'));
    }

    public function create()
    {
        $layanan = Layanan::where('status', 1)->orderBy('nama_layanan')->get();

        return view('pelanggan.booking', compact('layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'catatan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:tunai,qris,transfer',
            'layanan' => 'required|array|min:1',
            'layanan.*.id_layanan' => 'required|exists:layanan,id_layanan',
            'layanan.*.jumlah' => 'required|numeric|min:0.1|max:9999',
        ]);

        $idPelanggan = Auth::guard('pelanggan')->id();

        $transaksi = DB::transaction(function () use ($data, $idPelanggan) {
            $total = 0;
            $detailData = [];

            foreach ($data['layanan'] as $item) {
                $layanan = Layanan::findOrFail($item['id_layanan']);
                $subtotal = $layanan->harga * $item['jumlah'];
                $total += $subtotal;

                $detailData[] = [
                    'id_layanan' => $layanan->id_layanan,
                    'jumlah' => $item['jumlah'],
                    'harga' => $layanan->harga,
                    'subtotal' => $subtotal,
                ];
            }

            $transaksi = Transaksi::create([
                'id_pelanggan' => $idPelanggan,
                'id_user' => null,
                'tanggal_masuk' => now(),
                'total' => $total,
                'dibayar' => 0,
                'kembalian' => 0,
                'status_pembayaran' => 'belum_lunas',
                'metode_pembayaran' => $data['metode_pembayaran'],
                'status_laundry' => 'menunggu',
                'catatan' => $data['catatan'] ?? null,
            ]);

            foreach ($detailData as $detail) {
                $detail['id_transaksi'] = $transaksi->id_transaksi;
                DetailTransaksi::create($detail);
            }

            return $transaksi;
        });

        $pesan = match($transaksi->metode_pembayaran) {
            'qris'     => 'Pesanan ' . $transaksi->kode_transaksi . ' berhasil! Silakan scan QRIS saat mengambil cucian.',
            'transfer' => 'Pesanan ' . $transaksi->kode_transaksi . ' berhasil! Silakan transfer via Dana/GoPay/ShopeePay ke 0889-8598-4393 dan konfirmasi ke WhatsApp.',
            default    => 'Pesanan ' . $transaksi->kode_transaksi . ' berhasil! Silakan antar pakaian ke LAUNDRIA.',
        };

        // Kalau transfer/QRIS, arahkan ke halaman konfirmasi pembayaran
        if (in_array($transaksi->metode_pembayaran, ['transfer', 'qris'])) {
            return redirect()->route('pelanggan.konfirmasi', $transaksi->kode_transaksi);
        }

        return redirect()->route('pelanggan.dashboard')->with('success', $pesan);
    }
}