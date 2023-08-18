<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Buat user dengan role admin
        $adminRole = Role::where('name', 'user')->first();
        User::create([
            'name' => 'Agilar Gumilar',
            'email' => 'agilar@admin.com',
            'password' => Hash::make('password'),
            'nik' => '1234567890123456',
            'birthplace' => 'Malang',
            'birthdate' => '2002-11-10',
            'address' => 'Jl Klayatan 3C 39',
            'phone' => '081232090819',
            'role' => 'user',
        ])->roles()->attach($adminRole);

        $adminRole = Role::where('name', 'user')->first();
        User::create([
            'name' => 'siuser',
            'email' => 'user@admin.com',
            'password' => Hash::make('passworduser'),
            'birthplace' => 'Malang',
            'birthdate' => '2002-11-10',
            'address' => 'Jl Klayatan 3C 39',
            'phone' => '081232090819',
            'role' => 'user',
        ])->roles()->attach($adminRole);

        $adminRole = Role::where('name', 'admin')->first();
        User::create([
            'name' => 'siuser2',
            'email' => 'user2@admin.com',
            'password' => Hash::make('passworduser'),
            'birthplace' => 'Malang',
            'birthdate' => '2002-11-10',
            'address' => 'Jl Klayatan 3C 39',
            'phone' => '081232090819',
            'role' => 'admin',
        ])->roles()->attach($adminRole);


    }
}
