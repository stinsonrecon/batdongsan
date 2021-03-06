<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer=$customer;
        $this->middleware(['auth:customer']);
    }

    public function index(){
        $id = Auth::user()->id;
        $cities = City::orderBy('name')->get();
        $customer = $this->customer->find($id);
        $full_name = $this->convert_name($this->customer->find($id)->full_name);
        $full_name = str_replace('-', '', $full_name);
        return view('front-end.contents.customer.account-manager.index',['cities' => $cities, 'customer' => $customer, 'full_name' => $full_name]);
    }
    // public function verify(){
    //     $id = Auth::user()->id;
    //     $verify =  $this->convert_name($this->customer->find($id)->verify);
    //     dd($verify);
    //     return view('front-end.components.header', ['verify' => $verify]);
    // }
    public function edit(){
        $id = Auth::user()->id;

        $customer = $this->customer->find($id);

        $cities = City::orderBy('name')->get();

        $full_name = $this->convert_name($this->customer->find($id)->full_name);

        $full_name = str_replace('-', '', $full_name);

        return view('front-end.contents.customer.account-manager.edit', ['customer' => $customer, 'cities' => $cities, 'full_name' => $full_name]);
    }

    public function update(Request $request){
        $id = Auth::user()->id;

        try{
            DB::beginTransaction();

            $request->validate([
                'full_name' => 'required|max:255',
                'username' => 'required|max:255',
                'email' => 'required|max:255',
                'DoB' => 'required|date',
                'SSN_front' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'SSN_back' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $data = [
                'full_name' => $request->full_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'username' => $request->username,
                'DoB' => $request->DoB,
            ];

            $full_name = $this->convert_name($request->full_name);

            $full_name = str_replace('-', '', $full_name);

            if(!empty($request->SSN)){
                $request->validate([
                    'SSN' => 'required|max:12',
                ]);

                $ssn_old = $this->customer->find($id)->SSN;

                $ssn_new = $request->SSN;

                $ssn_front_old = 'public/ssn_front/' . $ssn_old . "_" . $full_name;

                $ssn_back_old = 'public/ssn_back/' . $ssn_old . "_" . $full_name;

                //dd($ssn_back_old);

                if($ssn_old != $ssn_new){
                    $data['verify'] = 0;

                    Storage::deleteDirectory($ssn_front_old);

                    Storage::deleteDirectory($ssn_back_old);
                }

                $data['SSN'] = $request->SSN;
            }

            if ($request->hasFile('SSN_front')) {
                $dataFile = array();

                $fileNameOrigin = $request->file('SSN_front')->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                $filePath = $request->file('SSN_front')->storeAs('public/ssn_front/' . $request->SSN . "_" . $full_name, $fileNameHash);

                //dd("run here");

                $dataFile = [
                    'file_name' => $fileNameHash,
                    'file_path' => Storage::url($filePath)
                ];

                if(!empty($dataFile)){
                    //dd("run here");
                    $data['SSN_front'] = $dataFile['file_name'];

                    $data['verify'] = 0;
                }
                else{
                    $data['SSN_front'] = NULL;
                }
                //dd("run here");
            }

            if ($request->hasFile('SSN_back')) {
                $dataFile = array();

                $fileNameOrigin = $request->file('SSN_back')->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                $filePath = $request->file('SSN_back')->storeAs('public/ssn_back/' . $request->SSN . "_" . $full_name, $fileNameHash);

                $dataFile = [
                    'file_name' => $fileNameHash,
                    'file_path' => Storage::url($filePath)
                ];

                if(!empty($dataFile)){
                    $data['SSN_back'] = $dataFile['file_name'];
                    $data['verify'] = 0;
                }
                else{
                    $data['SSN_back'] = NULL;
                }
            }
            $this->customer->find($id)->update($data);

            DB::commit();
            session()->flash('success', 'B???n ???? s???a th??nh c??ng.');
            return redirect()->route('account.index');

        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }
    public function postedNews() {
        $id_cus = Auth::user()->id;

        $all_news = News::where('id_cus', '=', $id_cus)
                    ->orderBy('created_at', 'desc')
                    ->orderBy('limitTime', 'asc')
                    ->latest()->paginate(5);

        $show_news = News::where('id_cus', '=', $id_cus)
                    ->where('status', '=', 2)
                    ->orderBy('limitTime', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(5);

        $wait_news = News::where('id_cus', '=', $id_cus)
                    ->where('status', '=', 1)
                    ->orderBy('limitTime', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->latest()->paginate(5);

        $end_news = News::where('id_cus', '=', $id_cus)
                    ->where('status', '=', 3)
                    ->orderBy('limitTime', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->latest()->paginate(5);

        return view('front-end.contents.customer.account-manager.posted-news', [
            'all_news' => $all_news,
            'show_news' => $show_news,
            'wait_news' => $wait_news,
            'end_news' => $end_news
        ]);
    }

    public static function convert_name($str) {
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
		$str = preg_replace("/(??)/", 'd', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
		$str = preg_replace("/(??)/", 'D', $str);
		$str = preg_replace("/(\???|\???|\???|\???|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
