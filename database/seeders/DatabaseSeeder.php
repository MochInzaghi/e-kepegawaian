<?php

namespace Database\Seeders;

use App\Models\DataPegawai;
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
        // DataPegawai::factory()->count(5)->create();
        $this->call([
            UserSeeder::class
        ]);
    }
}
