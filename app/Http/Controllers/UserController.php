<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // // Menampilkan daftar user dengan role 'User' dan yang telah di-approve
    // public function index()
    // {
    //     $users = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'User');
    //     })
    //     ->whereNotNull('approved_at')
    //     ->with(['personalData', 'usaha.keuangan'])
    //     ->get();

    //     return view('backend.pages.users.index', compact('users'));
    // }

    // // Menampilkan detail lengkap user tertentu
    // public function show($id)
    // {
    //     $user = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'User');
    //     })
    //     ->whereNotNull('approved_at')
    //     ->with(['personalData', 'usaha.keuangan'])
    //     ->findOrFail($id);

    //     return view('backend.pages.users.show', compact('user'));
    // }

    // // Menampilkan data pribadi user tertentu
    // public function showPersonalData($id)
    // {
    //     $user = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'User');
    //     })
    //     ->whereNotNull('approved_at')
    //     ->with('personalData')
    //     ->findOrFail($id);

    //     return view('backend.pages.users.personal', compact('user'));
    // }

    // // Menampilkan data usaha user tertentu
    // public function showUsaha($id)
    // {
    //     $user = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'User');
    //     })
    //     ->whereNotNull('approved_at')
    //     ->with('usaha')
    //     ->findOrFail($id);

    //     return view('backend.pages.users.usaha', compact('user'));
    // }

    // // Menampilkan data keuangan user tertentu
    // public function showKeuangan($id)
    // {
    //     $user = User::whereHas('roles', function ($query) {
    //         $query->where('name', 'User');
    //     })
    //     ->whereNotNull('approved_at')
    //     ->with('usaha.keuangan')
    //     ->findOrFail($id);

    //     return view('backend.pages.users.keuangan', compact('user'));
    // }

    // // Menghapus user
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    // }
}
