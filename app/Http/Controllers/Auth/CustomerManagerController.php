<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class CustomerManagerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer=$customer;

        $this->middleware(['auth:admin', 'role:admin|staff|super admin']);

        $this->middleware('permission:verify register customer|create customer|edit customer|delete customer');

        $this->middleware('permission:verify register customer', ['only' => ['verify']]);

        $this->middleware('permission:create customer', ['only' => ['create', 'store']]);

        $this->middleware('permission:edit customer', ['only' => ['edit', 'update']]);

        $this->middleware('permission:delete customer', ['only' => ['delete']]);
    }

    public function index(){
        $customers = $this->customer->paginate(5);
        return view('admin.content.customer.index', ['customers' => $customers]);
    }

    public function detail(int $id){
        $customer = $this->customer->find($id);

        $full_name = $this->convert_name($this->customer->find($id)->full_name);

        $full_name = str_replace('-', '', $full_name);

        return view('admin.content.customer.customerDetail', ['customer' => $customer, 'full_name' => $full_name]);
    }

    public function verify($id,Request $request)
    {
        try{
            DB::beginTransaction();

            $data = [
                'verify' => $request->verify
            ];

            $this->customer->find($id)->update($data);

            DB::commit();

            session()->flash('success', 'Bạn đã xác thực thành công.');

            return redirect()->route('admin.customer.index');
        }
        catch(Exception $exception){
            DB::rollBack();
        }
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

    public function create (){
        $cities = City::orderBy('name')->get();
        return view('admin.content.customer.add', compact('cities'));
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

        $this->customer->create($data);

        return redirect()->route('admin.customer.index');

    }

    public function edit(int $id){
        $customer = $this->customer->find($id);

        $cities = City::orderBy('name')->get();

        $full_name = $this->convert_name($this->customer->find($id)->full_name);

        $full_name = str_replace('-', '', $full_name);

        return view('admin.content.customer.edit', ['customer' => $customer, 'cities' => $cities, 'full_name' => $full_name]);
    }

    public function update(int $id, Request $request){
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

            if(!empty($request->password)){
                $request->validate([
                    'password' => 'required|confirmed|min:6'
                ]);
                $data['password'] = Hash::make($request->password);
            }

            $this->customer->find($id)->update($data);

            DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
            return redirect()->route('admin.customer.index');

        }
        catch(Exception $exception){
            DB::rollBack();

        }
    }

    public function delete(int $id){
        $customer = $this->customer->find($id);

        $full_name = $this->convert_name($customer->full_name);

        $full_name = str_replace('-', '', $full_name);

        $ssn = $customer->SSN;

        $ssn_front_old = 'public/ssn_front/' . $ssn . "_" . $full_name;

        $ssn_back_old = 'public/ssn_back/' . $ssn . "_" . $full_name;

        $this->customer->find($id)->delete();

        Storage::deleteDirectory($ssn_front_old);

        Storage::deleteDirectory($ssn_back_old);

        session()->flash('success', 'Bạn đã xóa thành công.');

        return redirect()->route('admin.customer.index');
    }
}
