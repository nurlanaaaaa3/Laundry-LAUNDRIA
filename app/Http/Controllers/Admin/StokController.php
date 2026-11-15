<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stok;
use App\Models\RiwayatStok;
use App\Models\Mesin;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'stok');

        $stokList   = Stok::orderBy('nama_item')->get();
        $stokMenipis = $stokList->filter(fn($s) => $s->stok_sekarang <= $s->stok_minimum && $s->stok_sekarang > 0);
        $stokHabis   = $stokList->filter(fn($s) => $s->stok_sekarang <= 0);

        $riwayat = RiwayatStok::with(['stok', 'user'])->latest()->take(50)->get();
        $mesinList = Mesin::orderBy('nama_mesin')->get();

        return view('admin.stok.index', compact(
            'tab', 'stokList', 'stokMenipis', 'stokHabis', 'riwayat', 'mesinList'
        ));
    }

    // ── STOK ──
    public function storeStok(Request $request)
    {
        $data = $request->validate([
            'nama_item'    => 'required|string|max:100',
            'kategori'     => 'nullable|string|max:50',
            'stok_sekarang'=> 'required|numeric|min:0',
            'stok_minimum' => 'required|numeric|min:0',
            'satuan'       => 'required|string|max:20',
            'harga_satuan' => 'nullable|numeric|min:0',
            'keterangan'   => 'nullable|string',
        ]);

        $data['harga_satuan'] = (int) ($data['harga_satuan'] ?? 0);

        $stok = Stok::create($data);

        if ($data['stok_sekarang'] > 0) {
            RiwayatStok::create([
                'id_stok'    => $stok->id_stok,
                'tipe'       => 'masuk',
                'jumlah'     => $data['stok_sekarang'],
                'keterangan' => 'Stok awal',
                'id_user'    => auth()->id(),
            ]);
        }

        return redirect()->route('admin.stok.index')->with('success', 'Item stok berhasil ditambahkan.');
    }

    public function updateStok(Request $request, Stok $stok)
    {
        $data = $request->validate([
            'nama_item'    => 'required|string|max:100',
            'kategori'     => 'nullable|string|max:50',
            'stok_minimum' => 'required|numeric|min:0',
            'satuan'       => 'required|string|max:20',
            'harga_satuan' => 'nullable|numeric|min:0',
            'keterangan'   => 'nullable|string',
        ]);

        $stok->update($data);
        return redirect()->route('admin.stok.index')->with('success', 'Item stok berhasil diupdate.');
    }

    public function destroyStok(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('admin.stok.index')->with('success', 'Item stok berhasil dihapus.');
    }

    public function masuk(Request $request, Stok $stok)
    {
        $data = $request->validate([
            'jumlah'     => 'required|numeric|min:0.1',
            'keterangan' => 'nullable|string',
        ]);

        $stok->increment('stok_sekarang', $data['jumlah']);
        RiwayatStok::create([
            'id_stok'    => $stok->id_stok,
            'tipe'       => 'masuk',
            'jumlah'     => $data['jumlah'],
            'keterangan' => $data['keterangan'] ?? 'Stok masuk',
            'id_user'    => auth()->id(),
        ]);

        return redirect()->route('admin.stok.index')->with('success', "Stok {$stok->nama_item} berhasil ditambah.");
    }

    public function keluar(Request $request, Stok $stok)
    {
        $data = $request->validate([
            'jumlah'     => 'required|numeric|min:0.1',
            'keterangan' => 'nullable|string',
        ]);

        if ($data['jumlah'] > $stok->stok_sekarang) {
            return back()->withErrors(['jumlah' => 'Jumlah keluar melebihi stok tersedia.'])->withInput();
        }

        $stok->decrement('stok_sekarang', $data['jumlah']);
        RiwayatStok::create([
            'id_stok'    => $stok->id_stok,
            'tipe'       => 'keluar',
            'jumlah'     => $data['jumlah'],
            'keterangan' => $data['keterangan'] ?? 'Stok keluar',
            'id_user'    => auth()->id(),
        ]);

        return redirect()->route('admin.stok.index')->with('success', "Stok {$stok->nama_item} berhasil dikurangi.");
    }

    // ── MESIN ──
    public function storeMesin(Request $request)
    {
        $data = $request->validate([
            'nama_mesin'    => 'required|string|max:100',
            'tipe'          => 'nullable|string|max:50',
            'merk'          => 'nullable|string|max:50',
            'kapasitas'     => 'nullable|integer|min:1',
            'status'        => 'required|in:aktif,servis,rusak',
            'tanggal_beli'  => 'nullable|date',
            'servis_terakhir'=> 'nullable|date',
            'keterangan'    => 'nullable|string',
        ]);

        Mesin::create($data);
        return redirect()->route('admin.stok.index', ['tab' => 'mesin'])->with('success', 'Mesin berhasil ditambahkan.');
    }

    public function updateMesin(Request $request, Mesin $mesin)
    {
        $data = $request->validate([
            'nama_mesin'    => 'required|string|max:100',
            'tipe'          => 'nullable|string|max:50',
            'merk'          => 'nullable|string|max:50',
            'kapasitas'     => 'nullable|integer|min:1',
            'status'        => 'required|in:aktif,servis,rusak',
            'tanggal_beli'  => 'nullable|date',
            'servis_terakhir'=> 'nullable|date',
            'keterangan'    => 'nullable|string',
        ]);

        $mesin->update($data);
        return redirect()->route('admin.stok.index', ['tab' => 'mesin'])->with('success', 'Mesin berhasil diupdate.');
    }

    public function destroyMesin(Mesin $mesin)
    {
        $mesin->delete();
        return redirect()->route('admin.stok.index', ['tab' => 'mesin'])->with('success', 'Mesin berhasil dihapus.');
    }
}
