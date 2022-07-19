<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;
use App\Models\House;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeDetailController extends Controller
{
    private $customer;
    public function nhadat($id){
        $cities = City::orderBy('name')->get();
        $new = News::find($id);
        return view('front-end.contents.estate.nha-detail',['cities' => $cities, 'new' => $new]);
    }
}
