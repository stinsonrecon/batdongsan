<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Land;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use Exception;

class LandController extends Controller
{
    private $land;

    public function __construct(Land $land)
    {
        $this->land=$land;

        $this->middleware(['auth:admin', 'role:admin|super admin']);
    }

    public function index(){
        $lands=$this->land->paginate(5);
        return view('admin.content.land.index',compact('lands'));
    }

    public function detail($id){
        $land = $this->land->find($id);
        return view('admin.content.land.landDetail', ['land' => $land]);
    }

    public function create(){
        $cities = City::orderBy('name')->get();
        return view('admin.content.land.add',['cities' => $cities]);
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

            //dd($data);

            Land::create($data);

            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('admin.land.index');

        }
        catch(Exception $exception){

            DB::rollBack();

        }
    }

    public function edit($id){
        $land=$this->land->find($id);
        $cities = City::orderBy('name')->get();
        return view('admin.content.land.edit',['cities' => $cities, 'land' => $land]);
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
                'phap_ly' => $request->phap_ly,
            ];

            if ($request->hasFile('linkImg')) {
                $dataFile = array();

                $linkImg_old=$this->land->find($id)->linkImg;

                foreach($linkImg_old as $img){
                    $linkPath = 'public/file/' . $img;

                    Storage::delete($linkPath);
                }

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

            $this->land->find($id)->update($data);

            DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
            return redirect()->route('admin.land.index');

        }
        catch(Exception $exception){
            DB::rollBack();

        }
    }

    public function delete($id){
        $land = $this->land->find($id);

        $estate_image = 'public/estate_images/' . $land->news->idBanking;

        Storage::deleteDirectory($estate_image);

        $land->delete();

        session()->flash('success', 'Bạn đã xóa thành công.');

        return redirect()->route('admin.land.index');
    }
}
