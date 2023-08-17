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
    $adminRole = Role::where('name', 'admin')->first();

    User::create([
        'name' => 'Admin 1',
        'email' => 'admin12@example.com',
        'password' => Hash::make('adminpassword'),
        'nik' => '1234567890123456',
        'birthplace' => 'Malang',
        'birthdate' => '2002-11-10',
        'address' => 'Jl Klayatan 3C 39',
        'phone' => '081232090819',
        'role' => 'admin',
    ])->roles()->attach($adminRole);

    User::create([
        'name' => 'Admin 2',
        'email' => 'admin2@example.com',
        'password' => Hash::make('adminpassword'),
        'nik' => '1234567890123456',
        'birthplace' => 'Malang',
        'birthdate' => '2002-11-10',
        'address' => 'Jl Klayatan 3C 39',
        'phone' => '081232090819',
        'role' => 'admin',
    ])->roles()->attach($adminRole);

    User::create([
        'name' => 'Admin 3',
        'email' => 'admin3@example.com',
        'password' => Hash::make('adminpassword'),
        'nik' => '1234567890123456',
        'birthplace' => 'Malang',
        'birthdate' => '2002-11-10',
        'address' => 'Jl Klayatan 3C 39',
        'phone' => '081232090819',
        'role' => 'admin',
    ])->roles()->attach($adminRole);

    User::create([
        'name' => 'Admin 4',
        'email' => 'admin4@example.com',
        'password' => Hash::make('adminpassword'),
        'nik' => '1234567890123456',
        'birthplace' => 'Malang',
        'birthdate' => '2002-11-10',
        'address' => 'Jl Klayatan 3C 39',
        'phone' => '081232090819',
        'role' => 'admin',
    ])->roles()->attach($adminRole);

    User::create([
        'name' => 'Admin 5',
        'email' => 'admin5@example.com',
        'password' => Hash::make('adminpassword'),
        'nik' => '1234567890123456',
        'birthplace' => 'Malang',
        'birthdate' => '2002-11-10',
        'address' => 'Jl Klayatan 3C 39',
        'phone' => '081232090819',
        'role' => 'admin',
    ])->roles()->attach($adminRole);

    $adminRole = Role::where('name', 'user')->first();
        User::create([
            'name' => 'siuser',
            'email' => 'user2@admin.com',
            'password' => Hash::make('passworduser'),
            'birthplace' => 'Malang',
            'birthdate' => '2002-11-10',
            'address' => 'Jl Klayatan 3C 39',
            'phone' => '081232090819',
            'role' => 'user',
        ])->roles()->attach($adminRole);
}

}
