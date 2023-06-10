<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();
        \App\Models\Pemohon::factory(5)->create();
        \App\Models\CriteriaWeight::factory()->create(
            [
                'name' => 'Gaji Anggota',
                'type' => 'cost',
                'weight' => '0.25',
                'description' => 'Bagus',
            ],

        );
        \App\Models\CriteriaWeight::factory()->create(
            [
                'name' => 'Lama Pinjam',
                'type' => 'benefit',
                'weight' => '0.20',
                'description' => 'Bagus',
            ],

        );
        \App\Models\CriteriaWeight::factory()->create(
            [
                'name' => 'Status Anggota',
                'type' => 'benefit',
                'weight' => '0.10',
                'description' => 'Kurang Bagus',
            ],

        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Dimas',
        //     'email' => '1@1.com',
        //     'password' => bcrypt('admin123'),
        // ]);
    }
}
