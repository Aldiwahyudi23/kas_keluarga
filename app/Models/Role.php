<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use function PHPUnit\Framework\returnSelf;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "roles";

    protected $fillable = [
        'nama_role',
        'deskripsi'
    ];

    public function anggota()
    {
        Return $this->bilongsto(User::class); 
    }
}
