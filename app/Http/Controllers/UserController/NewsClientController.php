<?php

namespace App\Http\Controllers\UserController;

use App\Events\ClientPostNews;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\FormType;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Models\House;
use App\Models\Land;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class NewsClientController extends Controller
{
    private $news;

    public function __construct(News $news)
    {
        $this->news=$news;
        $this->middleware(['auth:customer']);
    }

    public function create(){
        $cities = City::orderBy('name')->get();

        $loai_tin = NewsType::all();

        $current_time = Carbon::now(7);

        $end_time = Carbon::now(7)->addDays(10);

        // $customer = Customer::find($id);

        return view('front-end.contents.estate.newsForm', ['cities' => $cities, 'loai_tin' => $loai_tin,
                                                'current_time' => $current_time, 'end_time' => $end_time]);
    }

    public function addToSession(Request $request)
    {
        $id_cus = Auth::user()->id;

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
                'phap_ly' => $request->phap_ly
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

            $data_news = [
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

            session()->put('estate', $data_land);

            session()->put('news', $data_news);

            return redirect()->route('bankList');
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
                'phap_ly' => $request->phap_ly
            ];

            $digits = 5;
            $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $idBanking = 'TN' . $number;
            $check = News::select('idBanking')->get();
            for ($i = 0; $i < $check->count(); $i++) {
                if ($idBanking == $check[$i]) {
                    $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                    $idBanking = 'TN' . $number;
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

            $data_news = [
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

            session()->put('estate', $data_house);

            session()->put('news', $data_news);

            return redirect()->route('bankList');
        }
    }

    public function bankList()
    {
        $loai_tin = NewsType::all();

        $current_time = Carbon::now(7);

        $end_time = Carbon::now(7)->addDays(10);

        $idBanking = session()->get('news')['idBanking'];

        return view('front-end.contents.estate.bankList', [
            'loai_tin' => $loai_tin,
            'current_time' => $current_time, 'end_time' => $end_time,
            'idBanking' => $idBanking
        ]);
    }

    public function store()
    {
        $data_estate = session()->get('estate');

        $data_news = session()->get('news');

        if($data_news['loai_hinhthuc_id'] == 5 || $data_news['loai_hinhthuc_id'] == 6 || $data_news['loai_hinhthuc_id'] == 7 || $data_news['loai_hinhthuc_id'] == 8){
            $land = new Land($data_estate);

            $land->save();

            $data_news['id_dat'] = $land->id;

            $news = new News($data_news);

            $news->save();

            DB::commit();

            session()->forget('estate');

            session()->forget('news');

            $data_noti = [
                'id' => $news->id,
                'author' => Auth::user()->username,
                'idBanking' => $data_news['idBanking'],
                'message' => 'Đăng tin nhà',
                'time' => $news->created_at
            ];

            event(new ClientPostNews($data_noti));

            session()->flash('success', 'Bạn đã đăng tin thành công.');

            return redirect()->route('account.postedNews.index');
        }
        else{
            $house = new House($data_estate);

            $house->save();

            $data_news['id_nha'] = $house->id;

            $news = new News($data_news);

            $news->save();

            DB::commit();

            session()->forget('estate');

            session()->forget('news');

            $data_noti = [
                'id' => $news->id,
                'author' => Auth::user()->username,
                'idBanking' => $data_news['idBanking'],
                'message' => 'Đăng tin đất',
                'time' => $news->created_at
            ];

            event(new ClientPostNews($data_noti));

            session()->flash('success', 'Bạn đã đăng tin thành công.');

            return redirect()->route('account.postedNews.index');
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
