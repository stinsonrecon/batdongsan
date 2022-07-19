<?php

namespace App\Http\Controllers\UserController;

use App\Events\ClientRegister;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ClientRegisterController extends Controller
{
    public function index(){
        $cities = City::orderBy('name')->get();

        return view('front-end.contents.customer.userRegister', ['cities' => $cities]);
    }

    public function store(Request $request){
        $request->validate([
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'DoB' => 'required|date',
            'SSN' => 'required|max:12',
            'SSN_front' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'SSN_back' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = [
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'DoB' => $request->DoB,
            'SSN' => $request->SSN,
        ];

        if ($request->hasFile('SSN_front')) {
            $dataFile = array();
            $file = $request->SSN_front;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalName();

            $full_name = $this->convert_name($request->full_name);

            $full_name = str_replace('-', '', $full_name);

            $filePath = $request->file('SSN_front')->storeAs('public/ssn_front/' . $request->SSN . "_" . $full_name, $fileNameHash);
            $dataFile = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];

            if(!empty($dataFile)){
                $data['SSN_front'] = $dataFile['file_name'];
            }
            else{
                $data['SSN_front'] = NULL;
            }
        }

        if ($request->hasFile('SSN_back')) {
            $dataFile = array();
            $file = $request->SSN_back;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalName();

            $full_name = $this->convert_name($request->full_name);

            $full_name = str_replace('-', '', $full_name);

            $filePath = $request->file('SSN_back')->storeAs('public/ssn_back/' . $request->SSN . "_" . $full_name, $fileNameHash);
            $dataFile = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];

            if(!empty($dataFile)){
                $data['SSN_back'] = $dataFile['file_name'];
            }
            else{
                $data['SSN_back'] = NULL;
            }
        }

        $customer = new Customer($data);

        $customer->save();
        //Customer::create($data);

        $time = Carbon::now();

        $data_client = [
            'id' => $customer->id,
            'username' => $request->username,
            'time' => $time
        ];

        event(new ClientRegister($data_client));

        auth('customer')->attempt($request->only('username', 'password'));

        return redirect()->route('client.news.create'); // change to account manager when fe finished
    }

    public static function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
