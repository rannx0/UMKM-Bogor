<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserDataController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })
            ->where('is_approved', 1)
            ->with(['personalData', 'usaha.keuangan'])
            ->get();

        return view('backend.pages.user_data.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })
            ->where('is_approved', 1)
            ->with(['personalData', 'usaha.keuangan'])
            ->findOrFail($id);

        return view('backend.pages.user_data.show', compact('user'));
    }

    public function showProfile($id)
    {
        $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'User ');
            })
            ->where('is_approved', 1)
            ->with(['profile', 'personalData', 'usaha.keuangan'])
            ->findOrFail($id);
    
        // Initialize media social links
        $mediaSocialLinks = [];
    
        // Check if profile exists
        if ($user->profile) {
            // Ambil media sosial untuk tampilkan pada view dengan status aktif/non-aktif
            $mediaSocialLinks = [
                'facebook' => ['url' => $user->profile->facebook, 'show' => !is_null($user->profile->facebook)],
                'twitter' => ['url' => $user->profile->twitter, 'show' => !is_null($user->profile->twitter)],
                'instagram' => ['url' => $user->profile->instagram, 'show' => !is_null($user->profile->instagram)],
                'youtube' => ['url' => $user->profile->youtube, 'show' => !is_null($user->profile->youtube)],
                'linkedin' => ['url' => $user->profile->linkedin, 'show' => !is_null($user->profile->linkedin)],
                'tiktok' => ['url' => $user->profile->tiktok, 'show' => !is_null($user->profile->tiktok)],
                'telegram' => ['url' => $user->profile->telegram, 'show' => !is_null($user->profile->telegram)],
                'discord' => ['url' => $user->profile->discord, 'show' => !is_null($user->profile->discord)],
                'github' => ['url' => $user->profile->github, 'show' => !is_null($user->profile->github)],
                'medium' => ['url' => $user->profile->medium, 'show' => !is_null($user->profile->medium)],
            ];
        }
    
        return view('backend.pages.user_data.profile', compact('user', 'mediaSocialLinks'));
    }

    public function showPersonalData($id)
    {
        $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })
            ->where('is_approved', 1)
            ->with('personalData')
            ->findOrFail($id);

        return view('backend.pages.user_data.personal', compact('user'));
    }

    public function showUsaha($id)
    {
        $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })
            ->where('is_approved', 1)
            ->with('usaha')
            ->findOrFail($id);

        return view('backend.pages.user_data.usaha', compact('user'));
    }

    public function showKeuangan($id)
    {
        $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })
            ->where('is_approved', 1)
            ->with('usaha.keuangan')
            ->findOrFail($id);

        return view('backend.pages.user_data.keuangan', compact('user'));
    }
}
