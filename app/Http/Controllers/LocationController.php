<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getLocations($type, $id)
    {
        $locations = [];

        switch ($type) {
            case 'provinsi':
                $locations = KabupatenKota::where('provinsi_id', $id)->get();
                break;
            case 'kabupaten_kota':
                $locations = Kecamatan::where('kabupaten_kota_id', $id)->get();
                break;
            case 'kecamatan':
                $locations = Kelurahan::where('kecamatan_id', $id)->get();
                break;
            default:
                return response()->json(['message' => 'Invalid location type'], 400);
        }

        return response()->json($locations);
    }
}

