<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NewsType;
use Illuminate\Http\Request;

class TypeOfNewsController extends Controller
{

    public function __construct(NewsType $newsType)
    {
        $this->newsType=$newsType;

        $this->middleware(['auth:admin', 'role:admin|staff|super admin']);

        $this->middleware('permission:create news_type|edit news_type');

        $this->middleware('permission:create news_type', ['only' => ['create', 'store']]);

        $this->middleware('permission:edit news_type', ['only' => ['edit', 'update']]);
    }

    public function index(){
        $newsTypes = NewsType::get();
        return view('admin.content.typeOfNews.index', compact('newsTypes'));
    }

    public function create(){
        return view('admin.content.typeOfNews.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric'
        ]);

        NewsType::create([
            'name' => $request->name,
            'gia' => $request->price,
        ]);

        return redirect()->route('admin.typeOfNews.index')
            ->with('success', 'Tạo loại tin tức thành công.');
    }

    public function edit(NewsType $newsType){
        return view('admin.content.typeOfNews.edit', compact('newsType'));
    }

    public function update(Request $request, NewsType $newsType){
        $newsType = NewsType::find($newsType->id);
        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric'
        ]);

        $newsType->update([
            'name' => $request->name,
            'gia' => $request->price,
        ]);

        return redirect()->route('admin.typeOfNews.index')
            ->with('success', 'Cập nhật loại tin tức thành công.');
    }
}
