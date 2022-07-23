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
            'nama' => 'Ma Haya',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Garut',
            'tanggal_lahir' => '02',
            'no_hp' => '0898',
            'alamat' => 'cihanja',
            'pekerjaan' => 'Ibu Rumah Tangga',
            'nik' => '001',
            'nama_hubungan' => 'Qodir',
            'hubungan' => 'Istri',
            'foto' => 'img/keluarga/50271431012020_female.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
