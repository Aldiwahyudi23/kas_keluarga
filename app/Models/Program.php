<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "programs";

    protected $fillable =[
        'id',
        'nama_program',
        'penjelasan',

    ];

    public function anggota() {
        Return $this->hasMany(Anggota::class);
    }
}
