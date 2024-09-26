<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'usaha_id',
        'modal_usaha',
        'asset_usaha',
        'penghasilan_bulanan',
        'penghasilan_tahunan',
        'jumlah_tenaga_kerja',
    ];

    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }
}
