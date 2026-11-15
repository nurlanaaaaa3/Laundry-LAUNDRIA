<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesin';
    protected $primaryKey = 'id_mesin';

    protected $fillable = [
        'nama_mesin', 'tipe', 'merk', 'kapasitas',
        'status', 'tanggal_beli', 'servis_terakhir', 'keterangan',
    ];

    protected $casts = [
        'tanggal_beli'    => 'date',
        'servis_terakhir' => 'date',
    ];
}
