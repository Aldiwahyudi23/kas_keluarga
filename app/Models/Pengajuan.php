<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuans";

    protected $fillable = [
        'id',
        'tanggal',
        'jumlah',
        'keterangan',
        'pembayaran',
        'kategori',
        'sekertaris',
        'bendahara',
        'ketua',
        'status',
        'anggaran_id',
        'pengeluaran_id',
        'anggota_id',
        'lama'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
