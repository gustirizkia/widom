<?php

namespace App\Http\Controllers;

use App\Models\RegDistrict;
use App\Models\RegRegency;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function getKota($provinsi)
    {
        $data = RegRegency::where("province_id", $provinsi)->get();

        return response()->json($data);
    }
    public function getKecamatan($kota)
    {
        $data = RegDistrict::where("regency_id", $kota)->get();

        return response()->json($data);
    }
}
