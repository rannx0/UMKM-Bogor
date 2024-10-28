<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Buat instance baru dari email.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function build()
    {
        return $this->subject('Akun Anda Telah Disetujui')
                    ->view('backend.emails.user_approved')
                    ->with(['user' => $this->user]);
    }
}
