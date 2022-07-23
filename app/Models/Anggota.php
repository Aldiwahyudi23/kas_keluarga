<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AnggotaKeluarga;

class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users";

    protected $fillable = [
        'id',
        'nama',
        'email',
        'username',
        'password',
        'no_hp',
        'program_id',
        'role_id',
        'anggota_kel_id',
        'deleted_at',
        'is_active',
    ];

    public function AnggotaKluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
