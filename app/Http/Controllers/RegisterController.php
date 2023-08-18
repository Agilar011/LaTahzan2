<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;

class RegisterController extends Controller
{
        protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Menambahkan role_id 2 (admin) ke relasi user
        $user->roles()->attach(2);

        return $user;
    }
}
