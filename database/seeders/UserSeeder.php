<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Constants\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Rokon',
            'email' => 'rokon@gmail.com',
            'role' => Role::ADMIN
        ]);

        User::factory()->create([
            'name' => 'Parvez',
            'email' => 'parvez@gmail.com',
        ]);
    }
}
