<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Mitsuki',
            'email' => 'mitsuki@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mitsuki123'),
        ]);
        $user->assignRole('Admin');
    }
}
