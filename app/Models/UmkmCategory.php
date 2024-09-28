<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmCategory extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function usaha()
    {
        return $this->hasMany(Usaha::class);
    }
}
