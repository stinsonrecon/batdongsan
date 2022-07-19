<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\House;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use Exception;

class HouseController extends Controller
{
    private $house;

    public function __construct(House $house)
    {
        $this->house=$house;

        $this->middleware(['auth:admin', 'role:admin|super admin']);
    }

    public function index(){
        $houses=$this->house->paginate(5);
        return view('admin.content.house.index',compact('houses'));
    }

    public function detail($id){
        $house = $this->house->find($id);
        return view('admin.content.house.houseDetail', compact('house'));
    }

    public function create(){
        $cities = City::orderBy('name')->get();
        return view('admin.content.house.add',['cities' => $cities]);
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $data = [
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
                foreach($request->file('linkImg') as $file){
                    $fileNameOrigin = $file->getClientOriginalName();
                    $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                    $filePath = $file->storeAs('public/file', $fileNameHash);
                    $dataFile[] = [
                        'file_name' => $fileNameHash,
                        'file_path' => Storage::url($filePath)
                    ];
                }
            }

            if(!empty($dataFile)){
                foreach($dataFile as $img){
                    $data['linkImg'][] = $img['file_name'];
                }
            }
            else{
                $data['linkImg'] = NULL;
            }

            House::create($data);

            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('admin.house.index');

        }
        catch(Exception $exception){

            DB::rollBack();

        }
    }

    public function edit($id){
        $house=$this->house->find($id);
        $cities = City::orderBy('name')->get();
        return view('admin.content.house.edit',['cities' => $cities, 'house' => $house]);
    }

    public function update($id,Request $request){
        try{
            DB::beginTransaction();

            $data = [
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

            if ($request->hasFile('linkImg')) {
                $linkImg_old=$this->house->find($id)->linkImg;

                foreach($linkImg_old as $img){
                    $linkPath = 'public/file/' . $img;

                    Storage::delete($linkPath);
                }

                $dataFile = array();

                foreach($request->file('linkImg') as $file){
                    $fileNameOrigin = $file->getClientOriginalName();
                    $fileNameHash = Str::random(20) . '.' . $fileNameOrigin;

                    $filePath = $file->storeAs('public/file', $fileNameHash);
                    $dataFile[] = [
                        'file_name' => $fileNameHash,
                        'file_path' => Storage::url($filePath)
                    ];
                }
                if(!empty($dataFile)){
                    foreach($dataFile as $img){
                        $data['linkImg'][] = $img['file_name'];
                    }
                }
                else{
                    $data['linkImg'] = NULL;
                }
            }

            $this->house->find($id)->update($data);

            DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
            return redirect()->route('admin.house.index');

        }
        catch(Exception $exception){
            DB::rollBack();

        }
    }

    public function delete($id){
        $house = $this->house->find($id);

        $estate_image = 'public/estate_images/' . $house->news->idBanking;

        Storage::deleteDirectory($estate_image);

        $house->delete();

        session()->flash('success', 'Bạn đã xóa thành công.');

        return redirect()->route('admin.house.index');
    }
}
