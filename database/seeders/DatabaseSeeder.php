<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(DataKeluargaSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
