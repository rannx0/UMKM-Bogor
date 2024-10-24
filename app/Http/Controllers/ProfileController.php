<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;
        $personalData = $user->personalData;
        $usaha = $user->usaha;
    
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }

        // Ambil media sosial untuk tampilkan pada view dengan status aktif/non-aktif
        $mediaSocialLinks = [
            'facebook' => ['url' => $profile->facebook, 'show' => !is_null($profile->facebook)],
            'twitter' => ['url' => $profile->twitter, 'show' => !is_null($profile->twitter)],
            'instagram' => ['url' => $profile->instagram, 'show' => !is_null($profile->instagram)],
            'youtube' => ['url' => $profile->youtube, 'show' => !is_null($profile->youtube)],
            'linkedin' => ['url' => $profile->linkedin, 'show' => !is_null($profile->linkedin)],
            'tiktok' => ['url' => $profile->tiktok, 'show' => !is_null($profile->tiktok)],
            'telegram' => ['url' => $profile->telegram, 'show' => !is_null($profile->telegram)],
            'discord' => ['url' => $profile->discord, 'show' => !is_null($profile->discord)],
            'github' => ['url' => $profile->github, 'show' => !is_null($profile->github)],
            'medium' => ['url' => $profile->medium, 'show' => !is_null($profile->medium)],
        ];
    
        return view('frontend.pages.user-profile.index', compact('profile', 'personalData', 'usaha', 'mediaSocialLinks'));
    }
    
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;
    
        // Jika profil tidak ada, buat profil kosong untuk user
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }
    
        // Ambil personal data dan usaha jika ada
        $personalData = $user->personalData;
        $usaha = $user->usaha;
    
        return view('frontend.pages.user-profile.edit', compact('user', 'profile', 'personalData', 'usaha'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'telegram' => 'nullable|url',
            'discord' => 'nullable|url',
            'github' => 'nullable|url',
            'medium' => 'nullable|url',
            'name' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
        $profile = $user->profile;
        $userId = $user->id;
        
        $storagePath = 'public/profiles/' . $userId;
    
        // Upload foto dan hapus jika perlu
        $profile->foto_profil = $this->uploadFile($request, 'foto_profil', $profile->foto_profil, $storagePath);
        $profile->foto_sampul = $this->uploadFile($request, 'foto_sampul', $profile->foto_sampul, $storagePath);
    
        // Perbarui status aktif untuk media sosial
        $socialMediaFields = ['instagram', 'facebook', 'twitter', 'linkedin', 'youtube', 'tiktok', 'telegram', 'discord', 'github', 'medium'];
        foreach ($socialMediaFields as $field) {
            $profile->$field = $request->input($field);
            $profile->{'show_' . $field} = $request->has('show_' . $field); // Set status aktif
        }
    
        $profile->bio = $request->input('bio');
        $profile->website = $request->input('website');
        
        // Simpan perubahan ke database tabel `profiles`
        $profile->save();
    
        // Perbarui data user (nama dan email)
        $user->name = $request->input('name');
        
        // Simpan perubahan ke database tabel `users`
        $user->save();
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    

    private function uploadFile($request, $fieldName, $currentFile, $storagePath)
    {
        if ($request->hasFile($fieldName)) {
            // Hapus file lama jika ada
            if ($currentFile) {
                Storage::delete($storagePath . '/' . $currentFile);
            }

            // Simpan file baru
            $file = $request->file($fieldName);
            $fileName = time() . '_' . $fieldName . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storagePath, $fileName);

            return $fileName;
        }

        // Kembalikan nama file lama jika tidak ada file baru yang diunggah
        return $currentFile;
    }
}
