<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminManageController extends Controller
{
    // Menampilkan daftar admin
    public function index()
    {
        $admins = User::role(['Administrator', 'CEO', 'Manager', 'UMKM Management', 'Configurations Management'])->get();
        return view('backend.superadmin.roles_permissions.index', compact('admins'));
    }

    // Menampilkan permissions user
    public function listPermissions()
    {
        $users = User::all(); // Mengambil semua pengguna
        $permissions = []; // Array untuk menyimpan permissions
    
        foreach ($users as $user) {
            $permissions[$user->id] = $user->getAllPermissions(); // Mengambil permissions untuk setiap user
        }
    
        return view('backend.superadmin.roles_permissions.user_permissions', compact('users', 'permissions'));
    }

    // Menampilkan form untuk membuat admin baru
    public function create()
    {
        // Ambil semua role yang relevan untuk admin
        $roles = Role::whereIn('name', ['Administrator', 'CEO', 'Manager', 'UMKM Management', 'Configurations Management'])->get();
        return view('backend.superadmin.roles_permissions.create', compact('roles'));
    }

    // Menyimpan admin baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,name', // Validasi untuk memastikan role valid
        ]);

        // Membuat user baru
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role ke user baru
        $admin->assignRole($request->role);

        return redirect()->route('admins.index')->with('success', 'Admin created successfully with role: ' . $request->role);
    }

    // Menampilkan form untuk mengedit admin
    public function edit(User $admin)
    {
        // Ambil semua role yang relevan untuk admin
        $roles = Role::whereIn('name', ['Administrator', 'CEO', 'Manager', 'UMKM Management', 'Configurations Management',])->get();
        return view('backend.superadmin.roles_permissions.edit', compact('admin', 'roles'));
    }

    // Mengupdate admin
    public function update(Request $request, User $admin)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,name', // Validasi untuk role
        ]);

        // Update admin
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        // Update role
        $admin->syncRoles($request->role);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully with role: ' . $request->role);
    }

    // Menghapus admin
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
