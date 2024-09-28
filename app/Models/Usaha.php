<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_usaha',
        'nib',
        'deskripsi_usaha',
        'kategori_umkm',
        'tanggal_berdiri',
        'alamat_usaha',
        'kordinat_usaha',
        'kecamatan_id',
        'kelurahan_id',
        'rt',
        'rw',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keuangan()
    {
        return $this->hasOne(Keuangan::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
