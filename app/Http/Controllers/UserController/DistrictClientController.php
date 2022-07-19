<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictClientController extends Controller
{
    public function getDistricts(Request $request)
    {
        $districts = District::where('matp', '=', $request->matp)->orderBy('name')->get();
        return $districts;
    }
    public function getWards(Request $request)
    {
        $wards = Ward::where('maqh', '=', $request->maqh)->orderBy('name')->get();
        return $wards;
    }
}
