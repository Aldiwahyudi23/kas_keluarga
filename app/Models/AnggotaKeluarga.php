<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Anggota;

class AnggotaKeluarga extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "keluargas";

    protected $fillable = [
        'nama',
        'nik',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'pekerjaan',
        'anak_ke',
        'keluarga_id',
        'foto',
        'tugu',
    ];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function keluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class);
    }

   
}
