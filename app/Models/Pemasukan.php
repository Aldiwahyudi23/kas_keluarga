<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
USE Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "pemasukans";

    protected $fillable = [
        'id',
        'tanggal',
        'jumlah',
        'keterangan',
        'kategori',
        'anggota_id',
        'foto',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
