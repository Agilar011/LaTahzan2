<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleUser;

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
            RoleUser::where(['user_id' => $userId, 'role_id' => 2])->update(['role_id' => 1]);
        } else {
            $user->update(['role' => 'user']);
            RoleUser::where(['user_id' => $userId, 'role_id' => 1])->update(['role_id' => 2]);
        }

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function hapusUser($id){
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    }
}


