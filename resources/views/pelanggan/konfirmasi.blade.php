<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #063B70 0%, #07549A 50%, #1976B8 100%);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 32px 24px 48px;
        }

        .wrap {
            width: 100%;
            max-width: 460px;
            margin: 0 auto;
        }

        /* Brand di atas */
        .brand {
            text-align: center;
            margin-bottom: 24px;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: 1px;
            text-shadow: 0 2px 12px rgba(0,0,0,0.2);
        }

        /* Card utama */
        .card-main {
            background: #FFFFFF;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.25);
        }

        /* Header card — gradient */
        .card-header-custom {
            background: linear-gradient(135deg, #07549A, #1976B8);
            padding: 32px 32px 28px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .card-header-custom::before {
            content: "";
            position: absolute;
            right: -40px; top: -40px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .card-header-custom::after {
            content: "";
            position: absolute;
            left: -20px; bottom: -50px;
            width: 120px; height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .success-ring {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.3);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
            position: relative; z-index: 1;
        }
        .success-ring i { font-size: 36px; color: #FFFFFF; }

        .card-header-custom h4 {
            color: #FFFFFF;
            font-weight: 700;
            font-size: 22px;
            margin-bottom: 6px;
            position: relative; z-index: 1;
        }
        .card-header-custom p {
            color: rgba(255,255,255,0.8);
            font-size: 13.5px;
            margin: 0;
            position: relative; z-index: 1;
        }

        /* Body card */
        .card-body-custom { padding: 20px 24px; }

        /* Kode pesanan */
        .kode-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #F8FAFC;
            border: 1.5px solid #E5E7EB;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 12px;
        }
        .kode-label { font-size: 11px; color: #94A3B8; font-weight: 500; margin-bottom: 3px; }
        .kode-value {
            font-family: ui-monospace, monospace;
            font-size: 20px;
            font-weight: 700;
            color: #07549A;
            letter-spacing: 2px;
        }
        .kode-badge {
            background: #EAF4FC;
            color: #07549A;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* Total */
        .total-section {
            text-align: center;
            padding: 12px;
            background: linear-gradient(135deg, #EAF4FC, #DBEAFE);
            border-radius: 12px;
            margin-bottom: 14px;
        }
        .total-label { font-size: 11px; color: #64748B; margin-bottom: 2px; }
        .total-value { font-size: 22px; font-weight: 700; color: #07549A; }

        /* Instruksi */
        .instruksi-box {
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 14px;
        }
        .instruksi-transfer {
            background: linear-gradient(135deg, #FFF7ED, #FFEDD5);
            border: 1px solid #FED7AA;
        }
        .instruksi-qris {
            background: linear-gradient(135deg, #F5F3FF, #EDE9FE);
            border: 1px solid #DDD6FE;
        }
        .instruksi-title {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .instruksi-transfer .instruksi-title { color: #C2410C; }
        .instruksi-qris .instruksi-title { color: #6D28D9; }
        .instruksi-body { font-size: 13.5px; line-height: 1.7; }
        .instruksi-transfer .instruksi-body { color: #92400E; }
        .instruksi-qris .instruksi-body { color: #5B21B6; }
        .nomor-rekening {
            font-size: 20px;
            font-weight: 700;
            color: #C2410C;
            display: block;
            margin: 4px 0 2px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: #F1F5F9;
            margin: 20px 0;
        }

        /* Tombol WA */
        .btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #25D366, #1ebe5d);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            padding: 16px 28px;
            width: 100%;
            text-decoration: none;
            transition: all 0.2s;
            margin-bottom: 12px;
            box-shadow: 0 4px 16px rgba(37,211,102,0.3);
        }
        .btn-wa:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37,211,102,0.4);
        }

        /* Tombol dashboard */
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #64748B;
            font-size: 13.5px;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.15s;
            width: 100%;
        }
        .btn-back:hover { background: #F1F5F9; color: #374151; }

        /* Step indicator */
        .step-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #64748B;
            padding: 8px 12px;
            background: #F8FAFC;
            border-radius: 8px;
            margin-bottom: 6px;
        }
        .step-info i { color: #07549A; font-size: 14px; flex-shrink: 0; }

        @media (max-width: 480px) {
            .card-body-custom { padding: 20px; }
            .card-header-custom { padding: 24px 20px 20px; }
            .kode-value { font-size: 20px; }
        }
    </style>
</head>
<body>
    <div class="wrap">

        {{-- Brand --}}
        <div class="brand">LAUNDRIA</div>

        <div class="card-main">

            {{-- Header --}}
            <div class="card-header-custom">
                <div class="success-ring">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h4>Pesanan Berhasil! 🎉</h4>
                <p>Pesanan kamu sudah masuk dan sedang diproses oleh tim kami.</p>
            </div>

            {{-- Body --}}
            <div class="card-body-custom">

                {{-- Kode Pesanan --}}
                <div class="kode-section">
                    <div>
                        <div class="kode-label">Kode Pesanan</div>
                        <div class="kode-value">{{ $transaksi->kode_transaksi }}</div>
                    </div>
                    <span class="kode-badge">
                        <i class="bi bi-clock me-1"></i>Menunggu
                    </span>
                </div>

                {{-- Total --}}
                <div class="total-section">
                    <div class="total-label">Total Pembayaran</div>
                    <div class="total-value">Rp{{ number_format($transaksi->total, 0, ',', '.') }}</div>
                </div>

                {{-- Instruksi Pembayaran --}}
                @if($transaksi->metode_pembayaran === 'transfer')
                <div class="instruksi-box instruksi-transfer">
                    <div class="instruksi-title">
                        <i class="bi bi-bank"></i> Instruksi Transfer
                    </div>
                    <div class="instruksi-body">
                        Transfer via <strong>Dana / GoPay / ShopeePay</strong> ke:<br>
                        <span class="nomor-rekening">0889-8598-4393</span>
                        <span style="font-size:12px;">a.n LAUNDRIA</span>
                    </div>
                </div>
                @elseif($transaksi->metode_pembayaran === 'qris')
                <div class="instruksi-box instruksi-qris">
                    <div class="instruksi-title">
                        <i class="bi bi-qr-code-scan"></i> Instruksi QRIS
                    </div>
                    <div class="instruksi-body">
                        Admin akan mengirimkan <strong>QR Code</strong> via WhatsApp setelah pesanan dikonfirmasi. Silakan scan untuk menyelesaikan pembayaran.
                    </div>
                </div>
                @endif

                <div class="divider"></div>

                {{-- Tombol WA --}}
                @php
                    $namaPelanggan = Auth::guard('pelanggan')->user()->nama_pelanggan;
                    $metodeTeks = $transaksi->metode_pembayaran === 'qris' ? 'QRIS' : 'Transfer (Dana/GoPay/ShopeePay)';
                    $pesanWa = "Halo LAUNDRIA, saya *{$namaPelanggan}* ingin konfirmasi pembayaran.\n\nKode Pesanan: *{$transaksi->kode_transaksi}*\nTotal: *Rp" . number_format($transaksi->total, 0, ',', '.') . "*\nMetode: *{$metodeTeks}*\n\nMohon dikonfirmasi. Terima kasih!";
                    $urlWa = 'https://wa.me/628898598393?text=' . urlencode($pesanWa);
                @endphp

                <a href="{{ $urlWa }}" target="_blank" class="btn-wa">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.533 5.857L.057 23.882l6.187-1.453A11.943 11.943 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.853 0-3.587-.5-5.084-1.375l-.361-.214-3.741.879.937-3.643-.235-.374A9.934 9.934 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    Konfirmasi via WhatsApp
                </a>

                <a href="{{ route('pelanggan.dashboard') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>

            </div>
        </div>

    </div>
</body>
</html>
