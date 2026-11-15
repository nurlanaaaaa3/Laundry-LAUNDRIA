<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';

    protected $fillable = [
        'nama_item', 'kategori', 'stok_sekarang',
        'stok_minimum', 'satuan', 'harga_satuan', 'keterangan',
    ];

    public function riwayat()
    {
        return $this->hasMany(RiwayatStok::class, 'id_stok');
    }

    public function getStatusStokAttribute()
    {
        if ($this->stok_sekarang <= 0) return 'habis';
        if ($this->stok_sekarang <= $this->stok_minimum) return 'menipis';
        return 'aman';
    }
}
