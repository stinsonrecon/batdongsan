<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Form;
use App\Models\FormType;
use App\Models\House;
use App\Models\Land;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use Exception;

class NewsController extends Controller
{
    private $news;

    public function __construct(News $news)
    {
        $this->news=$news;

        $this->middleware(['auth:admin', 'role:admin|staff|super admin']);

        $this->middleware('permission:verify estate news|create estate news|edit estate news|delete estate news');

        $this->middleware('permission:verify estate news', ['only' => ['verify']]);

        $this->middleware('permission:create estate news', ['only' => ['create', 'store']]);

        $this->middleware('permission:edit estate news', ['only' => ['edit', 'update']]);

        $this->middleware('permission:delete estate news', ['only' => ['delete']]);
    }

    public function index(){
        $news = $this->news->paginate(5);

        return view('admin.content.news.index', ['news' => $news]);
    }

    public function detail($id)
    {
        $new = $this->news->find($id);

        return view('admin.content.news.detail', ['new' => $new]);
    }

    public function verify($id,Request $request)
    {
        try{
            DB::beginTransaction();

            $data = [
                'status' => $request->status
            ];

            $this->news->find($id)->update($data);

            DB::commit();

            session()->flash('success', 'Bạn đã kiểm duyệt thành công.');

            return redirect()->route('admin.news.index');
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }

    public function create($id){
        $cities = City::orderBy('name')->get();

        $loai_tin = NewsType::all();

        $current_time = Carbon::now(7);

        $end_time = Carbon::now(7)->addDays(10);

        $customer = Customer::find($id);

        return view('admin.content.news.create', ['cities' => $cities, 'loai_tin' => $loai_tin,
                                                'current_time' => $current_time, 'end_time' => $end_time,
                                                'customer' => $customer]);
    }

    public function store($id_cus, Request $request)
    {
        if($request->loai_hinhthuc == 5 || $request->loai_hinhthuc == 6 || $request->loai_hinhthuc == 7 || $request->loai_hinhthuc == 8)
        {
            $data_land = [
                'mo_ta' => $request->mo_ta,
                'matp' => $request->city,
                'maqh' => $request->district,
                'xaid' => $request->ward,
                'ten_duong' => $request->ten_duong,
                'dientich' => $request->dientich,
                'mat_tien' => $request->mat_tien,
                'duong_vao' => $request->duong_vao,
                'huong_nha' => $request->huong_nha,
                'phap_ly' => $request->phap_ly,
            ];

            $digits = 5;
            $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $idBanking = 'TD' . $number;
            $check = News::select('idBanking')->get();
            for ($i = 0; $i < $check->count(); $i++) {
                if ($idBanking == $check[$i]) {
                    $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                    $idBanking = 'TD' . $number;
                    $i = -1;
                }
            }

            $dataFile = array();

            if ($request->hasFile('linkImg')) {
                foreach($request->file('linkImg') as $file){
                    $fileNameOrigin = $file->getClientOriginalName();
                    $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                    $filePath = $file->storeAs('public/estate_images/' . $idBanking, $fileNameHash);
                    $dataFile[] = [
                        'file_name' => $fileNameHash,
                        'file_path' => Storage::url($filePath)
                    ];
                }
            }

            if(!empty($dataFile)){
                foreach($dataFile as $img){
                    $data_land['linkImg'][] = $img['file_name'];
                }
            }
            else{
                $data_land['linkImg'] = NULL;
            }

            $land = new Land($data_land);

            $land->save();

            $data_news = [
                'id_dat' => $land->id,
                'id_cus' => $id_cus,
                'title' => $request->title,
                'loai_hinhthuc_id' => $request->loai_hinhthuc,
                'gia' => $request->gia,
                'donvi_id' => $request->don_vi,
                'id_type' => $request->loai_tin,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'contact_name' => $request->contact_name,
                'contact_phone' => $request->contact_phone,
                'email' => $request->email,
                'address' => $request->address,
                'idBanking' => $idBanking
            ];

            $news = new News($data_news);

            $news->save();

            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('admin.news.index');
        }
        else{
            $data_house = [
                'mo_ta' => $request->mo_ta,
                'matp' => $request->city,
                'maqh' => $request->district,
                'xaid' => $request->ward,
                'ten_duong' => $request->ten_duong,
                'dientich' => $request->dientich,
                'mat_tien' => $request->mat_tien,
                'duong_vao' => $request->duong_vao,
                'huong_nha' => $request->huong_nha,
                'huong_ban_cong' => $request->huong_ban_cong,
                'so_tang' => $request->so_tang,
                'phong_ngu' => $request->phong_ngu,
                'toilet' => $request->toilet,
                'noi_that' => $request->noi_that,
                'phap_ly' => $request->phap_ly,
            ];

            $digits = 5;
            $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $idBanking = 'TN' . $number;
            $check = News::select('idBanking')->get();
            for ($i = 0; $i < $check->count(); $i++) {
                if ($idBanking == $check[$i]) {
                    $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                    $idBanking = 'DH' . $number;
                    $i = -1;
                }
            }

            $dataFile = array();

            if ($request->hasFile('linkImg')) {
                foreach($request->file('linkImg') as $file){
                    $fileNameOrigin = $file->getClientOriginalName();
                    $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                    $filePath = $file->storeAs('public/estate_images/' . $idBanking, $fileNameHash);
                    $dataFile[] = [
                        'file_name' => $fileNameHash,
                        'file_path' => Storage::url($filePath)
                    ];
                }
            }

            if(!empty($dataFile)){
                foreach($dataFile as $img){
                    $data_house['linkImg'][] = $img['file_name'];
                }
            }
            else{
                $data_house['linkImg'] = NULL;
            }

            $house = new House($data_house);

            $house->save();

            $data_news = [
                'id_nha' => $house->id,
                'id_cus' => $id_cus,
                'title' => $request->title,
                'loai_hinhthuc_id' => $request->loai_hinhthuc,
                'gia' => $request->gia,
                'donvi_id' => $request->don_vi,
                'id_type' => $request->loai_tin,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'contact_name' => $request->contact_name,
                'contact_phone' => $request->contact_phone,
                'email' => $request->email,
                'address' => $request->address,
                'idBanking' => $idBanking
            ];

            $news = new News($data_news);

            $news->save();

            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('admin.news.index');
        }
    }

    public function edit($id, $id_cus)
    {
        $new = $this->news->find($id);

        if($new->formType->hinhthuc_id == 1)
        {
            $units = Unit::all()->take(5);
        }
        else if($new->formType->hinhthuc_id == 2){
            $units = Unit::skip(5)->take(6)->get();
        }

        $cities = City::orderBy('name')->get();

        $loai_tin = NewsType::all();

        $current_time = Carbon::now(7);

        $end_time = Carbon::now(7)->addDays(10);

        $customer = Customer::find($id_cus);

        return view('admin.content.news.edit', ['cities' => $cities, 'loai_tin' => $loai_tin,
                                            'current_time' => $current_time, 'end_time' => $end_time,
                                            'customer' => $customer, 'new' => $new, 'units' => $units]);
    }

    public function update($id, Request $request)
    {
        try{
            DB::beginTransaction();

            if($request->loai_hinhthuc == 5 || $request->loai_hinhthuc == 6 || $request->loai_hinhthuc == 7 || $request->loai_hinhthuc == 8)
            {
                $data_land = [
                    'mo_ta' => $request->mo_ta,
                    'matp' => $request->city,
                    'maqh' => $request->district,
                    'xaid' => $request->ward,
                    'ten_duong' => $request->ten_duong,
                    'dientich' => $request->dientich,
                    'mat_tien' => $request->mat_tien,
                    'duong_vao' => $request->duong_vao,
                    'huong_nha' => $request->huong_nha,
                    'phap_ly' => $request->phap_ly,
                ];
                $dataFile = array();

                if ($request->hasFile('linkImg')) {
                    $estateImg = 'public/estate_images/' . $request->idBanking;

                    Storage::deleteDirectory($estateImg);

                    foreach($request->file('linkImg') as $file){
                        $fileNameOrigin = $file->getClientOriginalName();
                        $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                        $filePath = $file->storeAs('public/estate_images/' . $request->idBanking, $fileNameHash);
                        $dataFile[] = [
                            'file_name' => $fileNameHash,
                            'file_path' => Storage::url($filePath)
                        ];
                    }
                }

                if(!empty($dataFile)){
                    foreach($dataFile as $img){
                        $data_land['linkImg'][] = $img['file_name'];
                    }
                }

                $land = Land::find($request->estate_id);

                $land->update($data_land);
            }
            else
            {
                $data_house = [
                    'mo_ta' => $request->mo_ta,
                    'matp' => $request->city,
                    'maqh' => $request->district,
                    'xaid' => $request->ward,
                    'ten_duong' => $request->ten_duong,
                    'dientich' => $request->dientich,
                    'mat_tien' => $request->mat_tien,
                    'duong_vao' => $request->duong_vao,
                    'huong_nha' => $request->huong_nha,
                    'huong_ban_cong' => $request->huong_ban_cong,
                    'so_tang' => $request->so_tang,
                    'phong_ngu' => $request->phong_ngu,
                    'toilet' => $request->toilet,
                    'noi_that' => $request->noi_that,
                    'phap_ly' => $request->phap_ly,
                ];

                $dataFile = array();

                if ($request->hasFile('linkImg')) {
                    $estateImg = 'public/estate_images/' . $request->idBanking;

                    Storage::deleteDirectory($estateImg);

                    foreach($request->file('linkImg') as $file){
                        $fileNameOrigin = $file->getClientOriginalName();
                        $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                        $filePath = $file->storeAs('public/estate_images/' . $request->idBanking, $fileNameHash);
                        $dataFile[] = [
                            'file_name' => $fileNameHash,
                            'file_path' => Storage::url($filePath)
                        ];
                    }
                }

                if(!empty($dataFile)){
                    foreach($dataFile as $img){
                        $data_house['linkImg'][] = $img['file_name'];
                    }
                }

                $house = House::find($request->estate_id);

                $house->update($data_house);
            }
            $data_news = [
                'title' => $request->title,
                'loai_hinhthuc_id' => $request->loai_hinhthuc,
                'gia' => $request->gia,
                'donvi_id' => $request->don_vi,
                'id_type' => $request->loai_tin,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'contact_name' => $request->contact_name,
                'contact_phone' => $request->contact_phone,
                'email' => $request->email,
                'address' => $request->address
            ];

            $new = $this->news->find($id);

            $new->update($data_news);

            DB::commit();

            session()->flash('success', 'Bạn đã cập nhật thành công.');

            return redirect()->route('admin.news.index');
        }
        catch(Exception $e)
        {
            DB::rollBack();
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();

            $new = $this->news->find($id);

            if($new->id_nha != null)
            {
                $house = House::find($new->id_nha);

                $house->delete();

                $estateImg = 'public/estate_images/' . $new->idBanking;

                Storage::deleteDirectory($estateImg);
            }
            else
            {
                $land = Land::find($new->id_dat);

                $land->delete();

                $estateImg = 'public/estate_images/' . $new->idBanking;

                Storage::deleteDirectory($estateImg);
            }

            DB::commit();

            session()->flash('success', 'Bạn đã xóa thành công.');

            return redirect()->route('admin.news.index');
        }
        catch(Exception $e)
        {
            DB::rollBack();
        }
    }

    public function getLoaiHinhThuc(Request $request)
    {
        $loai_hinhthuc = FormType::where('hinhthuc_id', '=', $request->hinhthuc)->orderBy('name')->get();
        return $loai_hinhthuc;
    }

    public function getDonVi(Request $request)
    {
        if($request->hinhthuc == 1){
            $don_vi = Unit::all()->take(5);
            return $don_vi;
        }
        else if($request->hinhthuc == 2){
            $don_vi = Unit::skip(5)->take(6)->get();
            return $don_vi;
        }
        return null;
    }

    public function getNewsPrice(Request $request)
    {
        $price = NewsType::select('gia')->where('id', '=', $request->loai_tin)->get();
        return $price;
    }
}
