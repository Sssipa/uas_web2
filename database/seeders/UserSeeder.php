<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'ihiyyy',
            'email' => 'ihiyy@gmail.com',
            'password' => Hash::make('ihiy123'),
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'cihuyyy',
            'email' => 'cihuyy@gmail.com',
            'password' => Hash::make('cihuy123'),
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'adminnn',
            'email' => 'adminn@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
