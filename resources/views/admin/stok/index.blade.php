<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok & Mesin - LAUNDRIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }

        /* Tab */
        .tab-btn {
            padding: 9px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.15s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .tab-btn.active { background: #07549A; color: #fff; }
        .tab-btn:not(.active) { background: #F1F5F9; color: #64748B; }
        .tab-btn:not(.active):hover { background: #EAF4FC; color: #07549A; }

        /* Alert stok */
        .alert-stok {
            background: #FFFBEB;
            border: 1px solid #FDE68A;
            border-radius: 12px;
            padding: 12px 18px;
            font-size: 13px;
            color: #92400E;
            margin-bottom: 16px;
        }
        .alert-stok-habis {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 12px;
            padding: 12px 18px;
            font-size: 13px;
            color: #B91C1C;
            margin-bottom: 16px;
        }

        /* Card */
        .main-card { background: #fff; border: 1px solid #E5E7EB; border-radius: 16px; overflow: hidden; }
        .main-card-header { padding: 18px 24px 14px; border-bottom: 1px solid #F1F5F9; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }

        /* Tabel */
        .table-stok th { font-size: 11.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #64748B; background: #F8FAFC; border-bottom: 2px solid #E5E7EB; padding: 11px 14px; white-space: nowrap; }
        .table-stok td { font-size: 13px; color: #374151; padding: 12px 14px; vertical-align: middle; border-bottom: 1px solid #F1F5F9; }
        .table-stok tbody tr:last-child td { border-bottom: none; }
        .table-stok tbody tr:hover td { background: #F8FAFC; }

        /* Badge status stok */
        .badge-aman    { background: #DCFCE7; color: #15803D; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
        .badge-menipis { background: #FEF9C3; color: #A16207; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
        .badge-habis   { background: #FEE2E2; color: #B91C1C; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }

        /* Badge status mesin */
        .badge-aktif  { background: #DCFCE7; color: #15803D; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
        .badge-servis { background: #FEF9C3; color: #A16207; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
        .badge-rusak  { background: #FEE2E2; color: #B91C1C; font-size: 11.5px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }

        /* Tombol */
        .btn-tambah { background: #07549A; color: #fff; border: none; border-radius: 10px; font-size: 13.5px; font-weight: 600; padding: 9px 20px; text-decoration: none; transition: all 0.2s; }
        .btn-tambah:hover { background: #063B70; color: #fff; }
        .btn-masuk  { background: #DCFCE7; color: #15803D; border: 1px solid #BBF7D0; border-radius: 7px; font-size: 12px; font-weight: 600; padding: 4px 10px; transition: all 0.15s; }
        .btn-masuk:hover { background: #BBF7D0; }
        .btn-keluar { background: #FEE2E2; color: #DC2626; border: 1px solid #FECACA; border-radius: 7px; font-size: 12px; font-weight: 600; padding: 4px 10px; transition: all 0.15s; }
        .btn-keluar:hover { background: #FECACA; }
        .btn-edit   { background: #EAF4FC; color: #07549A; border: 1px solid #CBE5F7; border-radius: 7px; font-size: 12px; font-weight: 600; padding: 4px 10px; text-decoration: none; transition: all 0.15s; }
        .btn-edit:hover { background: #CBE5F7; }
        .btn-hapus  { background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; border-radius: 7px; font-size: 12px; font-weight: 600; padding: 4px 10px; transition: all 0.15s; }
        .btn-hapus:hover { background: #FEE2E2; }

        /* Modal form */
        .form-label { font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control, .form-select { border-radius: 9px; border-color: #D1D5DB; font-size: 13.5px; padding: 10px 14px; }
        .form-control:focus, .form-select:focus { border-color: #07549A; box-shadow: 0 0 0 3px rgba(7,84,154,0.1); }
        .btn-simpan { background: #07549A; color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; padding: 10px 24px; }
        .btn-simpan:hover { background: #063B70; color: #fff; }
    </style>
</head>
<body>
<div class="admin-wrapper">
    @include('admin.partials.sidebar')
    <div class="admin-content">
        @include('admin.partials.topbar', ['title' => 'Stok & Mesin'])

        <div class="p-4">

            @if(session('success'))
                <div class="alert alert-success mb-3" style="border-radius:10px; font-size:13.5px;">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-3" style="border-radius:10px; font-size:13.5px;">
                    <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif

            {{-- Alert stok --}}
            @if($stokHabis->count() > 0)
                <div class="alert-stok-habis">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <strong>{{ $stokHabis->count() }} item stok habis:</strong>
                    {{ $stokHabis->pluck('nama_item')->join(', ') }}
                </div>
            @endif
            @if($stokMenipis->count() > 0)
                <div class="alert-stok">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>{{ $stokMenipis->count() }} item stok menipis:</strong>
                    {{ $stokMenipis->pluck('nama_item')->join(', ') }}
                </div>
            @endif

            {{-- Tab --}}
            <div class="d-flex gap-2 mb-4 flex-wrap">
                <a href="{{ route('admin.stok.index', ['tab' => 'stok']) }}"
                    class="tab-btn {{ $tab === 'stok' ? 'active' : '' }}">
                    <i class="bi bi-box-seam"></i> Stok Bahan
                </a>
                <a href="{{ route('admin.stok.index', ['tab' => 'riwayat']) }}"
                    class="tab-btn {{ $tab === 'riwayat' ? 'active' : '' }}">
                    <i class="bi bi-clock-history"></i> Riwayat Pemakaian
                </a>
                <a href="{{ route('admin.stok.index', ['tab' => 'mesin']) }}"
                    class="tab-btn {{ $tab === 'mesin' ? 'active' : '' }}">
                    <i class="bi bi-gear"></i> Mesin Cuci
                </a>
            </div>

            {{-- ═══ TAB STOK BAHAN ═══ --}}
            @if($tab === 'stok')
            <div class="main-card">
                <div class="main-card-header">
                    <span style="font-size:15px; font-weight:600; color:#1F2937;">
                        <i class="bi bi-box-seam me-2 text-primary"></i>Daftar Stok Bahan
                    </span>
                    <button class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambahStok">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Item
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-stok mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Item</th>
                                <th>Kategori</th>
                                <th>Stok Sekarang</th>
                                <th>Min. Stok</th>
                                <th>Harga/Satuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stokList as $item)
                            <tr>
                                <td style="color:#94A3B8; font-size:12px;">{{ $loop->iteration }}</td>
                                <td style="font-weight:600;">{{ $item->nama_item }}</td>
                                <td style="color:#64748B;">{{ $item->kategori ?? '-' }}</td>
                                <td>
                                    <span style="font-weight:700; font-size:15px; color:{{ $item->stok_sekarang <= 0 ? '#DC2626' : ($item->stok_sekarang <= $item->stok_minimum ? '#D97706' : '#16A34A') }}">
                                        {{ number_format($item->stok_sekarang, 1) }}
                                    </span>
                                    <span style="font-size:12px; color:#94A3B8;"> {{ $item->satuan }}</span>
                                </td>
                                <td style="color:#64748B;">{{ number_format($item->stok_minimum, 1) }} {{ $item->satuan }}</td>
                                <td style="color:#07549A; font-weight:600;">Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                <td>
                                    @if($item->status_stok === 'habis')
                                        <span class="badge-habis">🔴 Habis</span>
                                    @elseif($item->status_stok === 'menipis')
                                        <span class="badge-menipis">⚠️ Menipis</span>
                                    @else
                                        <span class="badge-aman">✅ Aman</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <button class="btn-masuk" data-bs-toggle="modal"
                                            data-bs-target="#modalMasuk{{ $item->id_stok }}">
                                            <i class="bi bi-plus"></i> Masuk
                                        </button>
                                        <button class="btn-keluar" data-bs-toggle="modal"
                                            data-bs-target="#modalKeluar{{ $item->id_stok }}">
                                            <i class="bi bi-dash"></i> Keluar
                                        </button>
                                        <button class="btn-edit" data-bs-toggle="modal"
                                            data-bs-target="#modalEditStok{{ $item->id_stok }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('admin.stok.destroy', $item->id_stok) }}"
                                            class="d-inline" onsubmit="return confirm('Yakin hapus item ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-hapus"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Masuk --}}
                            <div class="modal fade" id="modalMasuk{{ $item->id_stok }}" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content" style="border-radius:16px; border:none;">
                                        <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                                            <h6 class="modal-title" style="font-weight:700; color:#063B70;">
                                                <i class="bi bi-plus-circle text-success me-2"></i>Stok Masuk — {{ $item->nama_item }}
                                            </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.stok.masuk', $item->id_stok) }}">
                                            @csrf
                                            <div class="modal-body" style="padding:20px;">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah ({{ $item->satuan }})</label>
                                                    <input type="number" name="jumlah" class="form-control" step="0.1" min="0.1" required placeholder="0">
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label">Keterangan (opsional)</label>
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Pembelian, restok, dll.">
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn-simpan btn-sm px-4">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Keluar --}}
                            <div class="modal fade" id="modalKeluar{{ $item->id_stok }}" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content" style="border-radius:16px; border:none;">
                                        <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                                            <h6 class="modal-title" style="font-weight:700; color:#DC2626;">
                                                <i class="bi bi-dash-circle text-danger me-2"></i>Stok Keluar — {{ $item->nama_item }}
                                            </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.stok.keluar', $item->id_stok) }}">
                                            @csrf
                                            <div class="modal-body" style="padding:20px;">
                                                <div style="background:#FEF2F2; border-radius:10px; padding:10px 14px; font-size:12.5px; color:#DC2626; margin-bottom:14px;">
                                                    Stok tersedia: <strong>{{ number_format($item->stok_sekarang, 1) }} {{ $item->satuan }}</strong>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah ({{ $item->satuan }})</label>
                                                    <input type="number" name="jumlah" class="form-control" step="0.1" min="0.1" max="{{ $item->stok_sekarang }}" required placeholder="0">
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label">Keterangan (opsional)</label>
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Pemakaian, rusak, dll.">
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn-simpan btn-sm px-4" style="background:#DC2626;">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Edit Stok --}}
                            <div class="modal fade" id="modalEditStok{{ $item->id_stok }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius:16px; border:none;">
                                        <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                                            <h6 class="modal-title" style="font-weight:700;">Edit Item — {{ $item->nama_item }}</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.stok.update', $item->id_stok) }}">
                                            @csrf @method('PUT')
                                            <div class="modal-body" style="padding:20px;">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label class="form-label">Nama Item</label>
                                                        <input type="text" name="nama_item" class="form-control" value="{{ $item->nama_item }}" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Kategori</label>
                                                        <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}" placeholder="Deterjen, Pewangi, dll.">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Satuan</label>
                                                        <input type="text" name="satuan" class="form-control" value="{{ $item->satuan }}" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Min. Stok</label>
                                                        <input type="number" name="stok_minimum" class="form-control" value="{{ $item->stok_minimum }}" step="0.1" min="0" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Harga/Satuan (Rp)</label>
                                                        <input type="number" name="harga_satuan" class="form-control" value="{{ $item->harga_satuan }}" min="0" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" rows="2">{{ $item->keterangan }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn-simpan btn-sm px-4">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="bi bi-box-seam" style="font-size:32px; color:#CBD5E1;"></i>
                                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada data stok.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- ═══ TAB RIWAYAT ═══ --}}
            @if($tab === 'riwayat')
            <div class="main-card">
                <div class="main-card-header">
                    <span style="font-size:15px; font-weight:600; color:#1F2937;">
                        <i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Pemakaian Stok
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-stok mb-0">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Item</th>
                                <th>Tipe</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $r)
                            <tr>
                                <td>
                                    {{ $r->created_at->format('d M Y') }}<br>
                                    <span style="font-size:11.5px; color:#94A3B8;">{{ $r->created_at->format('H:i') }}</span>
                                </td>
                                <td style="font-weight:500;">{{ $r->stok->nama_item ?? '-' }}</td>
                                <td>
                                    @if($r->tipe === 'masuk')
                                        <span style="background:#DCFCE7; color:#15803D; font-size:11.5px; font-weight:600; padding:4px 11px; border-radius:20px;">
                                            <i class="bi bi-plus"></i> Masuk
                                        </span>
                                    @else
                                        <span style="background:#FEE2E2; color:#DC2626; font-size:11.5px; font-weight:600; padding:4px 11px; border-radius:20px;">
                                            <i class="bi bi-dash"></i> Keluar
                                        </span>
                                    @endif
                                </td>
                                <td style="font-weight:600;">
                                    {{ number_format($r->jumlah, 1) }}
                                    <span style="font-size:12px; color:#94A3B8;">{{ $r->stok->satuan ?? '' }}</span>
                                </td>
                                <td style="color:#64748B;">{{ $r->keterangan ?? '-' }}</td>
                                <td style="color:#64748B; font-size:12.5px;">{{ $r->user->nama ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-clock-history" style="font-size:32px; color:#CBD5E1;"></i>
                                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada riwayat pemakaian.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- ═══ TAB MESIN ═══ --}}
            @if($tab === 'mesin')
            <div class="main-card">
                <div class="main-card-header">
                    <span style="font-size:15px; font-weight:600; color:#1F2937;">
                        <i class="bi bi-gear me-2 text-primary"></i>Daftar Mesin Cuci
                    </span>
                    <button class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambahMesin">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Mesin
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-stok mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mesin</th>
                                <th>Tipe / Merk</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Tgl Beli</th>
                                <th>Servis Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mesinList as $mesin)
                            <tr>
                                <td style="color:#94A3B8; font-size:12px;">{{ $loop->iteration }}</td>
                                <td style="font-weight:600;">{{ $mesin->nama_mesin }}</td>
                                <td style="color:#64748B;">{{ $mesin->tipe ?? '-' }} / {{ $mesin->merk ?? '-' }}</td>
                                <td>{{ $mesin->kapasitas ? $mesin->kapasitas.' kg' : '-' }}</td>
                                <td>
                                    @if($mesin->status === 'aktif')
                                        <span class="badge-aktif">✅ Aktif</span>
                                    @elseif($mesin->status === 'servis')
                                        <span class="badge-servis">🔧 Servis</span>
                                    @else
                                        <span class="badge-rusak">🔴 Rusak</span>
                                    @endif
                                </td>
                                <td style="color:#64748B; font-size:12.5px;">{{ $mesin->tanggal_beli?->format('d M Y') ?? '-' }}</td>
                                <td style="color:#64748B; font-size:12.5px;">{{ $mesin->servis_terakhir?->format('d M Y') ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditMesin{{ $mesin->id_mesin }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                        <form method="POST" action="{{ route('admin.mesin.destroy', $mesin->id_mesin) }}"
                                            class="d-inline" onsubmit="return confirm('Yakin hapus mesin ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-hapus"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Edit Mesin --}}
                            <div class="modal fade" id="modalEditMesin{{ $mesin->id_mesin }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius:16px; border:none;">
                                        <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                                            <h6 class="modal-title" style="font-weight:700;">Edit Mesin — {{ $mesin->nama_mesin }}</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.mesin.update', $mesin->id_mesin) }}">
                                            @csrf @method('PUT')
                                            <div class="modal-body" style="padding:20px;">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label class="form-label">Nama Mesin</label>
                                                        <input type="text" name="nama_mesin" class="form-control" value="{{ $mesin->nama_mesin }}" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Tipe</label>
                                                        <input type="text" name="tipe" class="form-control" value="{{ $mesin->tipe }}" placeholder="Front Load, Top Load">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Merk</label>
                                                        <input type="text" name="merk" class="form-control" value="{{ $mesin->merk }}" placeholder="Samsung, LG, dll.">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Kapasitas (kg)</label>
                                                        <input type="number" name="kapasitas" class="form-control" value="{{ $mesin->kapasitas }}" min="1">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" class="form-select" required>
                                                            <option value="aktif" {{ $mesin->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                            <option value="servis" {{ $mesin->status === 'servis' ? 'selected' : '' }}>Servis</option>
                                                            <option value="rusak" {{ $mesin->status === 'rusak' ? 'selected' : '' }}>Rusak</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Tanggal Beli</label>
                                                        <input type="date" name="tanggal_beli" class="form-control" value="{{ $mesin->tanggal_beli?->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Servis Terakhir</label>
                                                        <input type="date" name="servis_terakhir" class="form-control" value="{{ $mesin->servis_terakhir?->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" rows="2">{{ $mesin->keterangan }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn-simpan btn-sm px-4">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="bi bi-gear" style="font-size:32px; color:#CBD5E1;"></i>
                                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada data mesin.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

{{-- Modal Tambah Stok --}}
<div class="modal fade" id="modalTambahStok" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px; border:none;">
            <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                <h6 class="modal-title" style="font-weight:700; color:#063B70;">
                    <i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Item Stok
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.stok.store') }}">
                @csrf
                <div class="modal-body" style="padding:20px;">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nama Item</label>
                            <input type="text" name="nama_item" class="form-control" required placeholder="Deterjen, Pewangi, dll.">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" placeholder="Deterjen, Pewangi, Plastik, dll.">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Satuan</label>
                            <input type="text" name="satuan" class="form-control" required placeholder="kg, liter, pcs, botol">
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Stok Awal</label>
                            <input type="number" name="stok_sekarang" class="form-control" step="0.1" min="0" value="0" required>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Min. Stok</label>
                            <input type="number" name="stok_minimum" class="form-control" step="0.1" min="0" value="0" required>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Harga/Satuan (Rp)</label>
                            <input type="number" name="harga_satuan" class="form-control" min="0" value="0" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2" placeholder="Opsional"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-simpan btn-sm px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Tambah Mesin --}}
<div class="modal fade" id="modalTambahMesin" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px; border:none;">
            <div class="modal-header" style="border-bottom:1px solid #F1F5F9; padding:16px 20px;">
                <h6 class="modal-title" style="font-weight:700; color:#063B70;">
                    <i class="bi bi-gear me-2 text-primary"></i>Tambah Mesin Cuci
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.mesin.store') }}">
                @csrf
                <div class="modal-body" style="padding:20px;">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nama Mesin</label>
                            <input type="text" name="nama_mesin" class="form-control" required placeholder="Mesin Cuci 1, dll.">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Tipe</label>
                            <input type="text" name="tipe" class="form-control" placeholder="Front Load, Top Load">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Merk</label>
                            <input type="text" name="merk" class="form-control" placeholder="Samsung, LG, dll.">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Kapasitas (kg)</label>
                            <input type="number" name="kapasitas" class="form-control" min="1">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="aktif">Aktif</option>
                                <option value="servis">Servis</option>
                                <option value="rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Tanggal Beli</label>
                            <input type="date" name="tanggal_beli" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Servis Terakhir</label>
                            <input type="date" name="servis_terakhir" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2" placeholder="Opsional"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #F1F5F9; padding:14px 20px;">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-simpan btn-sm px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
