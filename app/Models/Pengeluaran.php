<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengeluaran extends Model
{
    use SoftDeletes;
    protected $table = "pengeluarans";

    protected $fillable = [
        'id',
        'tanggal',
        'jumlah',
        'alasan',
        'sekertaris',
        'bendahara',
        'ketua',
        'status',
        'anggaran_id',
        'anggota_id'
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
