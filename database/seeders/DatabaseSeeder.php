<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RumahSakit;
use App\Models\Pasien;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'maulanamlkib',
            'password' => bcrypt('12345'),
        ]);
        User::factory(10)->create();
        RumahSakit::factory(10)->create();
        Pasien::factory(150)->create();
    }
}
