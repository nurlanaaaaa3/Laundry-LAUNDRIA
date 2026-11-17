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
        body { font-family: 'Poppins', sans-serif; }

        .konfirmasi-wrap {
            min-height: 100vh;
            background: linear-gradient(160deg, #EAF4FC 0%, #FFFFFF 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .konfirmasi-card {
            background: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(7,84,154,0.15);
            padding: 40px;
            max-width: 480px;
            width: 100%;
            text-align: center;
        }

        .success-icon {
            width: 72px;
            height: 72px;
            background: #DCFCE7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: #16A34A;
        }

        .kode-box {
            background: #EAF4FC;
            border-radius: 12px;
            padding: 16px;
            margin: 20px 0;
        }
        .kode-box .kode {
            font-family: ui-monospace, monospace;
            font-size: 28px;
            font-weight: 700;
            color: #07549A;
            letter-spacing: 2px;
        }
        .kode-box .label {
            font-size: 12px;
            color: #64748B;
            margin-bottom: 4px;
        }

        .metode-box {
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            text-align: left;
        }
        .metode-transfer { background: #FFF7ED; border: 1px solid #FED7AA; }
        .metode-qris { background: #F5F3FF; border: 1px solid #DDD6FE; }

        .btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #25D366;
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
        }
        .btn-wa:hover {
            background: #1ebe5d;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37,211,102,0.3);
        }

        .btn-dashboard {
            display: block;
            color: #64748B;
            font-size: 14px;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.15s;
        }
        .btn-dashboard:hover {
            background: #F1F5F9;
            color: #374151;
        }

        .total-info {
            font-size: 22px;
            font-weight: 700;
            color: #07549A;
            margin: 4px 0 16px;
        }
    </style>
</head>
<body>
    <div class="konfirmasi-wrap">
        <div class="konfirmasi-card">

            <div class="success-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <h4 style="font-weight:700; color:#1F2937; margin-bottom:4px;">Pesanan Berhasil!</h4>
            <p style="color:#64748B; font-size:14px; margin-bottom:0;">Pesanan kamu sudah masuk dan sedang diproses.</p>

            <div class="kode-box">
                <div class="label">Kode Pesanan</div>
                <div class="kode">{{ $transaksi->kode_transaksi }}</div>
            </div>

            <div class="total-info">
                Rp{{ number_format($transaksi->total, 0, ',', '.') }}
            </div>

            @if($transaksi->metode_pembayaran === 'transfer')
            <div class="metode-box metode-transfer">
                <div style="font-weight:700; color:#C2410C; margin-bottom:8px;">
                    🏦 Instruksi Transfer
                </div>
                <div style="font-size:13.5px; color:#7C3AED; line-height:1.7;">
                    Silakan transfer pembayaran via <strong>Dana / GoPay / ShopeePay</strong> ke nomor:<br>
                    <span style="font-size:18px; font-weight:700; color:#C2410C;">0889-8598-4393</span><br>
                    <span style="font-size:12px; color:#92400E;">a.n LAUNDRIA</span>
                </div>
            </div>
            @elseif($transaksi->metode_pembayaran === 'qris')
            <div class="metode-box metode-qris">
                <div style="font-weight:700; color:#6D28D9; margin-bottom:8px;">
                    📱 Instruksi QRIS
                </div>
                <div style="font-size:13.5px; color:#5B21B6; line-height:1.7;">
                    Admin akan mengirimkan <strong>QR Code</strong> via WhatsApp setelah pesanan dikonfirmasi.
                    Silakan scan QR Code tersebut untuk menyelesaikan pembayaran.
                </div>
            </div>
            @endif

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

            <a href="{{ route('pelanggan.dashboard') }}" class="btn-dashboard">
                <i class="bi bi-arrow-left me-1"></i> Lihat Riwayat Pesanan
            </a>

        </div>
    </div>
</body>
</html>
