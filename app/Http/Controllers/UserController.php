<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Menampilkan daftar users dengan Role 'User'
    public function index()
    {
        // Mendapatkan role 'User'
        $role = Role::where('name', 'User')->first();

        // Mendapatkan semua users yang memiliki role 'User'
        $users = User::role($role->name)->get();

        return view('backend.pages.users.index', compact('users'));
    }

    // Menghapus user
    public function destroy($id)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id);

        // Menghapus user
        $user->delete();

        // Redirect kembali ke halaman daftar users dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
