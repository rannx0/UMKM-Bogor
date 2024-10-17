<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use App\Models\Admin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Menghitung total pengguna, Usaha, dan admin
        $totalUsers = User::role('User')->count();
        $totalUsaha = Usaha::count();

        $rolesToCount = ['Administrator', 'UMKM Management', 'Configurations Management', 'CEO'];
        $totalAdmins = User::role($rolesToCount)->count();

        // Mengirim data ke view
        return view('backend.superadmin.dashboard', compact('totalUsers', 'totalUsaha', 'totalAdmins'));
    }
}
