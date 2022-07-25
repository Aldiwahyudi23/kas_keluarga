<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluargas')->insert([
            'id' => 1,
            'nama' => 'Official Keluarga Alm.Ma Haya',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Garut',
            'tanggal_lahir' => '02',
            'no_hp' => '0898',
            'alamat' => 'cihanja',
            'pekerjaan' => 'Official',
            'nik' => '001',
            'keluarga_id' => '1',
            'hubungan' => 'Pengurus',
            'foto' => 'img/keluarga/50271431012020_female.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
