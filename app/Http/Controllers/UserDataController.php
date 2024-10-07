<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDataController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'User ');
        })->with(['personalData', 'usaha.keuangan'])->get();
        return view('backend.pages.user_data.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'User ');
        })->with(['personalData', 'usaha.keuangan'])->findOrFail($id);
        return view('backend.pages.user_data.show', compact('user'));
    }

    public function showPersonalData($id)
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'User ');
        })->with('personalData')->findOrFail($id);
        return view('backend.pages.user_data.personal', compact('user'));
    }

    public function showUsaha($id)
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'User ');
        })->with('usaha')->findOrFail($id);
        return view('backend.pages.user_data.usaha', compact('user'));
    }

    public function showKeuangan($id)
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'User ');
        })->with('usaha.keuangan')->findOrFail($id);
        return view('backend.pages.user_data.keuangan', compact('user'));
    }
}