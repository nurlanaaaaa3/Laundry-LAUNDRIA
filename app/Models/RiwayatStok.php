<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatStok extends Model
{
    protected $table = 'riwayat_stok';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'id_stok', 'tipe', 'jumlah', 'keterangan', 'id_user',
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
