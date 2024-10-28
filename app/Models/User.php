<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable, SoftDeletes; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'approved_at',
        'rejected_at',
        'rejection_reason',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function showTrashed()
    {
        $trashedUsers = User::onlyTrashed()->get(); // Mendapatkan pengguna yang dihapus
        return view('backend.superadmin.user-approval.trashed', compact('trashedUsers'));
    }

    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    public function usaha()
    {
        return $this->hasOne(Usaha::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
