<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $kategori = [
            ['name' => 'Elektronik', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fashion', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Otomotif', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kesehatan', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lainnya', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('kategoris')->insert($kategori);
    }
}
