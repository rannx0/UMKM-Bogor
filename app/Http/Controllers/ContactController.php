<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'comments' => 'required|string',
        ]);

        // Simpan data ke tabel contact_messages
        ContactMessage::create($validatedData);

        // Beri feedback kepada user
        return back()->with('success', 'Pesan Anda berhasil disimpan!');
    }
}
