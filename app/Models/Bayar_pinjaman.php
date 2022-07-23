<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_pinjaman extends Model
{
    use HasFactory;

    protected $table = "bayar_pinjamen";

    protected $fillable = [
        'id',
        'tanggal',
        'jumlah',
        'keterangan',
        'pengeluaran_id',
        'anggota_id',
        'foto',
    ];

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
