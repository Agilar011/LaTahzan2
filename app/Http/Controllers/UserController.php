<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function customerRead(){
        $data = User::all();
        return view('Template UI.admin.admin-category-page.customer.customer', compact('data'));
    }

    public function updateRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        if ($user->role === 'user') {
            $user->update(['role' => 'admin']);
        } else {
            $user->update(['role' => 'user']);
        }

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    
}
