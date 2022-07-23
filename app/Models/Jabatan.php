<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = "jabatan";

    protected $fillable = [
        'id',
        'nama_jabatan',
        'deskripsi',

    ];

    public function anggota() 
    {
        Return $this->hasMany(Anggota::class);
    }
}

