<?php

namespace App\Http\Controllers;

use App\Events\ClientPostNews;
use App\Events\ClientRegister;
use App\Models\News;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Psy\CodeCleaner\FunctionContextPass;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;


class TestSubmit extends Controller
{
    public function index(){
        // $land = News::whereNotNull('id_dat')->get();
        $land = News::whereNotNull('id_dat')->where('status', '=', 2)->where('loai_hinhthuc_id', '=', 5)
        ->orWhere('loai_hinhthuc_id', '=', 6)->orderBy('id_type', 'desc')
        ->orderBy('startTime', 'desc')->get();

        dd($land);

        return view('submitForm');
    }

    public function submit(Request $request){

        dd($request->add_permission);
        return view('submitForm');
    }
}
