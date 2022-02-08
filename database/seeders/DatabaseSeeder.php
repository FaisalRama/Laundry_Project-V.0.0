<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(UserSeeder::class);
        // \App\Models\member::factory(500)->create();
        // \App\Models\outlet::factory(500)->create();
        // \App\Models\paket::factory(100)->create();
    }
}