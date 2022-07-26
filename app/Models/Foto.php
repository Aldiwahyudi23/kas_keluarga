<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = "fotos" ;
    protected $fillable =[
        'keluarga_id',
        'user_id',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function keluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class);
    }
}
