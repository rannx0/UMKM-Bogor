<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'foto_profil', 'foto_sampul', 'bio', 'website',
        'instagram', 'facebook', 'twitter', 'linkedin', 'youtube',
        'tiktok', 'telegram', 'discord', 'github', 'medium'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
