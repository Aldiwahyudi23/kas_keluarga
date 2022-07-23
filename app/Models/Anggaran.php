<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggaran extends Model
{
    use HasFactory;
use SoftDeletes;

    protected $table = "anggarans";
    protected $fillable = [
        'id',
        'nama_anggaran',
        'deskripsi',
        'persen',
        'max_orang',
        'nominal_max_anggaran',
        'deleted_at',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
