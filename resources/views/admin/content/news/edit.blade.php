@extends('admin.app')

@section('title')
<title>News</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">News | Edit</h1>
        </div>
        <!-- Content -->
        <form class="rounded px-8 pt-6 pb-8 mb-4 flex justify-between" method="POST"
            action="{{route('admin.news.update', ['id' => $new->id])}}" enctype="multipart/form-data"
            id="form-id">
            @csrf
            <div class="w-3/4 mr-10 flex-col">
                <div class="border rounded-xl bg-white p-7 mb-10">
                    <div class="text-center mb-5 text-4xl font-semibold" style="color: #EF562D;">
                        Chỉnh sửa tin đăng
                    </div>
                    <div class="mb-4 text-lg font-medium" style="color: #696969;">
                        Thông tin cơ bản
                    </div>
                    <div class="mb-8 flex justify-between">
                        <select name="hinhthuc" id="hinhthuc"
                                class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none mr-2"
                                required>
                            @if ($new->formType->hinhthuc_id == 1 )
                                <option value="1">Bán</option>
                                <option value="2">Thuê</option>
                            @else
                                <option value="2">Thuê</option>
                                <option value="1">Bán</option>
                            @endif
                        </select>

                        <select name="loai_hinhthuc" id="loai_hinhthuc"
                         class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none ml-2"
                         onchange="displayFormType()" required>
                            <option value="{{ $new->loai_hinhthuc_id }}">{{ $new->formType->name }}</option>
                        </select>
                    </div>

                    <input type="text" name="idBanking" value="{{ $new->idBanking }}" class="hidden" readonly>
                    @if ($new->id_nha != null)
                        <input type="text" name="estate_id" value="{{ $new->id_nha }}" class="hidden" readonly>
                    @else
                        <input type="text" name="estate_id" value="{{ $new->id_dat }}" class="hidden" readonly>
                    @endif


                    <div class="flex  items-center mb-5" style="color: #888686;">
                        <div class="">Địa chỉ</div>
                        <div class="border w-11/12 ml-1"></div>
                    </div>

                    <div class="mb-6 grid grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block text-base font-bold mb-2 text-black" >
                                Thành phố
                                <span class=" text-base">*</span>
                            </label>
                            <select name="city" id="city" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                                @if ($new->id_nha != null)
                                    <option value="{{ $new->house->matp }}">{{ $new->house->city->name }}</option>
                                @else
                                    <option value="{{ $new->land->matp }}">{{ $new->land->city->name }}</option>
                                @endif
                                @foreach($cities as $city)
                                    <option value="{{ $city->matp }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label class="block text-base font-bold mb-2 text-black" >
                                Quận huyện
                                <span class=" text-base">*</span>
                            </label>
                            <select name="district" id="district" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                                @if ($new->id_nha != null)
                                    <option value="{{ $new->house->maqh }}">{{ $new->house->district->name }}</option>
                                @else
                                    <option value="{{ $new->land->maqh }}">{{ $new->land->district->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Xã phường thị trấn
                            </label>
                            <select name="ward" id="ward" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                                @if ($new->id_nha != null)
                                    <option value="{{ $new->house->xaid }}">{{ $new->house->ward->name }}</option>
                                @else
                                    <option value="{{ $new->land->xaid }}">{{ $new->land->ward->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Tên đường
                                <span class=" text-base">*</span>
                            </label>
                            @if ($new->id_nha != null)
                                <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                                id="ten_duong" name="ten_duong" type="text" placeholder="Nhập tên đường" value="{{ $new->house->ten_duong }}" required>
                            @else
                                <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                                id="ten_duong" name="ten_duong" type="text" placeholder="Nhập tên đường" value="{{ $new->land->ten_duong }}" required>
                            @endif

                        </div>
                    </div>

                    <div class="font-semibold text-lg mb-2" style="color: #696969;">
                        Thông tin bài viết
                    </div>
                    <div class="text-sm mb-10" style="color: #888686;">
                        Không gộp nhiều bất động sản trong một tin rao,
                        để quá trình đăng tin và duyệt nhanh hơn, xin lưu ý: gõ tiếng Việt có dấu và không viết tắt...
                    </div>

                    <div class="mb-4">
                        <label class="block text-base font-bold mb-2 text-black" >
                            Tiêu đề
                            <span class=" text-base">*</span>
                        </label>
                        <textarea name="title" id="title"
                                class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="2"
                                placeholder="VD: Bán nhà riêng 50m2 chính chủ Cầu Giấy" required>{{ $new->title }}</textarea>
                        <div style="color: #888686;" class="text-sm">
                            Tối thiểu 30 ký tự, tối đa 99 ký tự
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-base font-bold mb-2 text-black" >
                            Mô tả
                            <span class=" text-base">*</span>
                        </label>
                        @if ($new->id_nha != null)
                            <textarea name="mo_ta" id="ckeditor"
                                    class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="5"
                                    placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ : Khu nhà có vị trị thuận lợi, gần công viên, gần trường học"
                                    required>{{ $new->house->mo_ta }}</textarea>
                            <div style="color: #888686;" class="text-sm">
                        @else
                        <textarea name="mo_ta" id="ckeditor"
                                class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="5"
                                placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ : Khu nhà có vị trị thuận lợi, gần công viên, gần trường học"
                                required>{{ $new->land->mo_ta }}</textarea>
                        <div style="color: #888686;" class="text-sm">
                        @endif

                            Tối thiểu 30 ký tự, tối đa 3.000 ký tự
                        </div>
                    </div>

                    <script src="{{ asset('js/ckeditor.js') }}"></script>
                </div>

                <div class="border rounded-xl bg-white p-7 mb-10">
                    <div class="mb-4 text-lg font-medium" style="color: #696969;">
                        Thông tin bất động sản
                    </div>

                    <div class="mb-4">
                        <label class="block text-black text-sm font-bold mb-2" >
                        Diện tích (m²)
                        <span class=" text-base">*</span>
                        </label>
                        @if ($new->id_nha != null)
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline text-black"
                            id="dientich" name="dientich" type="number" min="1" placeholder="Nhập diện tích, VD 80,100" value="{{ $new->house->dientich }}" required>
                        @else
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline text-black"
                            id="dientich" name="dientich" type="number" min="1" placeholder="Nhập diện tích, VD 80,100" value="{{ $new->land->dientich }}" required>
                        @endif

                        <div style="color: #888686;" class="text-sm mt-3">
                            Tối thiểu 30 ký tự, tối đa 99 ký tự
                        </div>
                    </div>

                    <div class="mb-6 grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Mức giá
                                <span class=" text-base">*</span>
                            </label>
                            <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                             id="gia" name="gia" type="number" min="1" placeholder="Nhập mức giá, VD 12000000" value="{{ $new->gia }}" required>
                        </div>

                        <div>
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Đơn vị
                                <span class=" text-base">*</span>
                            </label>
                            <select name="don_vi" id="don_vi" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                                <option value="{{ $new->donvi_id  }}">{{ $new->don_vi->donvi }}</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->donvi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex  items-center mb-5" style="color: #888686;">
                        <div class="">Chi tiết</div>
                        <div class="border w-11/12 ml-1"></div>
                    </div>

                    @if ($new->id_nha != null)
                    <div class="flex mb-6 w-full justify-around" id="house_detail_only">
                        <div class="flex mb-6 text-black">
                            <label class="block text-sm font-bold mb-2 pt-3 pr-1" >
                            Số tầng
                            </label>
                            <div class="flex flex-row h-10 w-2/3 rounded-lg relative bg-transparent mt-1 ">
                                <button data-action="decrement" type="button"
                                    class="cart_update h-full w-20 rounded-l cursor-pointer outline-none border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                    <input type="number"
                                            class="focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                            min="0" value="{{ $new->house->so_tang }}" name="so_tang">
                                <button data-action="increment" type="button"
                                    class="cart_update h-full w-20 rounded-r cursor-pointer border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex mb-6 text-black ml-5">
                            <label class="block text-sm font-bold mb-2 pt-3 pr-1" >
                            Phòng ngủ
                            </label>
                            <div class="flex flex-row h-10 w-2/3 rounded-lg relative bg-transparent mt-1 ">
                                <button data-action="decrement" type="button"
                                    class="cart_update h-full w-20 rounded-l cursor-pointer outline-none border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                @if ($new->id_nha != null)
                                    <input type="number"
                                            class="focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                            min="0" value="{{ $new->house->phong_ngu }}" name="phong_ngu">
                                @endif
                                <button data-action="increment" type="button"
                                    class="cart_update h-full w-20 rounded-r cursor-pointer border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex mb-6 text-black justify-end">
                            <label class="block  text-sm font-bold mb-2 pt-3 pr-1" >
                            Toilet
                            </label>
                            <div class="flex flex-row h-10 w-2/3 rounded-lg relative bg-transparent mt-1 ">
                                <button data-action="decrement" type="button"
                                    class="cart_update h-full w-20 rounded-l cursor-pointer outline-none border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                @if ($new->id_nha != null)
                                    <input type="number"
                                        class="focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                        min="0" value="{{ $new->house->toilet }}" name="toilet">
                                @endif
                                <button data-action="increment" type="button"
                                    class="cart_update h-full w-20 rounded-r cursor-pointer border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="mb-4">
                            <label class="block  text-sm font-bold mb-2 text-black" >
                            Mặt tiền (m)
                            </label>
                            @if ($new->id_nha != null)
                                <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                                    id="mat_tien" name="mat_tien" type="number" min="1" value="{{ $new->house->mat_tien }}" placeholder="Mặt tiền">
                            @else
                                <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                                    id="mat_tien" name="mat_tien" type="number" min="1" value="{{ $new->land->mat_tien }}" placeholder="Mặt tiền">
                            @endif

                        </div>

                        <div class="mb-4">
                            <label class="block  text-sm font-bold mb-2 text-black" >
                            Đường vào (m)
                            </label>
                            @if ($new->id_nha != null)
                                <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                                    id="duong_vao" name="duong_vao" type="number" min="1" value="{{ $new->house->duong_vao }}" placeholder="Đường vào">
                            @else
                                <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                                    id="duong_vao" name="duong_vao" type="number" min="1" value="{{ $new->land->duong_vao }}" placeholder="Đường vào">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block  text-sm font-bold mb-2 text-black" >
                            Hướng nhà
                            </label>
                            <select name="huong_nha" id="huong_nha" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                                @if ($new->id_nha != null)
                                    <option value="{{ $new->house->huong_nha }}" selected>
                                        @switch($new->house->huong_nha)
                                            @case(1)
                                                Đông
                                                @break
                                            @case(2)
                                                Tây
                                                @break
                                            @case(3)
                                                Nam
                                                @break
                                            @case(4)
                                                Bắc
                                                @break
                                            @case(5)
                                                Đông Bắc
                                                @break
                                            @case(6)
                                                Tây Bắc
                                                @break
                                            @case(7)
                                                Đông Nam
                                                @break
                                            @case(8)
                                                Tây Nam
                                                @break
                                            @default
                                                &nbsp
                                                @break
                                        @endswitch
                                    </option>
                                @else
                                    <option value="{{ $new->land->huong_nha }}" selected>
                                        @switch($new->land->huong_nha)
                                            @case(1)
                                                Đông
                                                @break
                                            @case(2)
                                                Tây
                                                @break
                                            @case(3)
                                                Nam
                                                @break
                                            @case(4)
                                                Bắc
                                                @break
                                            @case(5)
                                                Đông Bắc
                                                @break
                                            @case(6)
                                                Tây Bắc
                                                @break
                                            @case(7)
                                                Đông Nam
                                                @break
                                            @case(8)
                                                Tây Nam
                                                @break
                                            @default
                                                &nbsp
                                                @break
                                        @endswitch
                                    </option>
                                @endif
                                <option value="1">Đông</option>
                                <option value="2">Tây</option>
                                <option value="3">Nam</option>
                                <option value="4">Bắc</option>
                                <option value="5">Đông Bắc</option>
                                <option value="6">Tây Bắc</option>
                                <option value="7">Đông Nam</option>
                                <option value="8">Tây Nam</option>
                            </select>
                        </div>

                        @if ($new->id_nha != null)
                            <div class="mb-4" id="house_huong_ban_cong">
                                <label class="block  text-sm font-bold mb-2 text-black" >
                                Hướng ban công
                                </label>
                                <select name="huong_ban_cong" id="huong_ban_cong" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                                    @if ($new->id_nha != null)
                                        <option value="{{ $new->house->huong_ban_cong }}" selected>
                                            @switch($new->house->huong_ban_cong)
                                                @case(1)
                                                    Đông
                                                    @break
                                                @case(2)
                                                    Tây
                                                    @break
                                                @case(3)
                                                    Nam
                                                    @break
                                                @case(4)
                                                    Bắc
                                                    @break
                                                @case(5)
                                                    Đông Bắc
                                                    @break
                                                @case(6)
                                                    Tây Bắc
                                                    @break
                                                @case(7)
                                                    Đông Nam
                                                    @break
                                                @case(8)
                                                    Tây Nam
                                                    @break
                                                @default
                                                    &nbsp
                                                    @break
                                            @endswitch
                                        </option>
                                    @endif
                                    <option value="1">Đông</option>
                                    <option value="2">Tây</option>
                                    <option value="3">Nam</option>
                                    <option value="4">Bắc</option>
                                    <option value="5">Đông Bắc</option>
                                    <option value="6">Tây Bắc</option>
                                    <option value="7">Đông Nam</option>
                                    <option value="8">Tây Nam</option>
                                </select>
                            </div>
                        @endif
                    </div>

                    <div class="mb-6" id="house_noi_that">
                        <label class="block  text-sm font-bold mb-2 text-black" >
                        Nội thất
                        </label>
                        @if ($new->id_nha != null)
                            <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="noi_that" name="noi_that" type="text" value="{{ $new->house->noi_that }}" placeholder="VD: Nội thất đầy đủ">
                        @endif
                    </div>

                    <div class="mb-6 text-black">
                        <label class="block  text-sm font-bold mb-2 text-black" >
                        Pháp lý
                        </label>
                        <div class="tag-field js-tags">
                            <input class="js-tag-input" placeholder="Pháp lý" id="textInput" oninput="phapLuatTagInput()"
                            id="phap_ly", name="phap_ly"/>
                            @if ($new->id_nha != null)
                                @foreach (explode(',', $new->house->phap_ly) as $phap_ly)
                                    <div class="tag js-tag" data-index="{{ $loop->index }}">
                                        <input value="{{ $new->house->phap_ly }}" class="hidden" name="phap_ly">{{ $phap_ly }}
                                        <span class="tag-close js-tag-close" data-index="{{ $loop->index }}">×</span>
                                    </div>
                                @endforeach
                            @else
                                @foreach (explode(',', $new->land->phap_ly) as $phap_ly)
                                    <div class="tag js-tag" data-index="{{ $loop->index }}">
                                        <input value="{{ $new->land->phap_ly }}" class="hidden" name="phap_ly">{{ $phap_ly }}
                                        <span class="tag-close js-tag-close" data-index="{{ $loop->index }}">×</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold mb-2 text-black">
                            Hình ảnh đã chọn
                        </label>
                        @if ($new->id_nha != null)
                            @if ($new->house->linkImg != null)
                                <div class="dark:text-primary-darker text-xl font-bold">
                                    @if (sizeof($new->house->linkImg) > 1)
                                        <div class="product-slider relative flex flex-wrap justify-around w-full"
                                            id="productList">
                                            <div class="splide__arrows hidden lg:block">
                                                <button type="button"
                                                    class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                    <i class="fas fa-caret-left"></i>
                                                </button>
                                                <button type="button"
                                                    class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                    <i class="fas fa-caret-right"></i>
                                                </button>
                                            </div>
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    @foreach ($new->house->linkImg as $img)
                                                        <li class="text-center splide__slide px-3">
                                                            <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex justify-center items-center">
                                            <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->house->linkImg)[0] }}" alt="">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @else
                            @if($new->land->linkImg != null)
                                <div class="dark:text-primary-darker text-xl font-bold">
                                    @if (sizeof($new->land->linkImg) > 1)
                                        <div class="product-slider relative flex flex-wrap justify-around w-full"
                                            id="productList">
                                            <div class="splide__arrows hidden lg:block">
                                                <button type="button"
                                                    class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                    <i class="fas fa-caret-left"></i>
                                                </button>
                                                <button type="button"
                                                    class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                    <i class="fas fa-caret-right"></i>
                                                </button>
                                            </div>
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    @foreach ($new->land->linkImg as $img)
                                                        <li class="text-center splide__slide px-3">
                                                            <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->land->linkImg)[0] }}" alt="">
                                    @endif
                                </div>
                            @endif
                        @endif
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                if (document.getElementsByClassName('product-slider')[0]) {
                                    new Splide('.product-slider', {
                                        perPage: 3,
                                        type: 'loop',
                                        autoplay: true,
                                        pauseOnHover: false,
                                    }).mount();
                                }
                            });
                        </script>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold mb-2 text-black">
                            Hình ảnh
                        </label>
                        <div style="color: #888686;" class="text-sm mb-4">
                            Hãy dùng ảnh thật, không trùng, không chèn số điện thoại.
                            Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin.
                        </div>
                        <div class="relative h-40 rounded-lg border-dashed border-2 border-black dark:border-primary-dark flex justify-center items-center hover:cursor-pointer">
                            <div class="absolute">
                                <div class="flex flex-col items-center ">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-gray-300"></i>
                                    <span class="block text-gray-400 font-normal">
                                        Attach you files here
                                    </span>
                                    <span class="block text-gray-400 font-normal">
                                        or
                                    </span>
                                    <span class="block text-blue-400 font-normal">
                                        Browse files
                                    </span>
                                </div>
                            </div>
                            <input class="h-full w-full opacity-0" id="linkImg" name="linkImg[]" type="file" multiple="multiple" onchange="image_select()">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 overflow-x-auto" id="container">
                        <!-- Image will be show here-->
                    </div>

                    <script src="{{ asset('js/imagePreview.js') }}"></script>
                </div>

                <div class="border rounded-xl bg-white p-7 mb-10 text-black">
                    <div class="mb-4 text-lg font-medium" style="color: #696969;">
                        Thông tin liên hệ
                    </div>

                    <div class="mb-6 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Tên liên hệ
                            </label>
                            <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="contact_name" name="contact_name"
                            type="text" placeholder="Tên liên hệ"
                            value="{{ $customer->full_name }}" required>
                        </div>

                        <div>
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Email
                            </label>
                            <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                             id="email" name="email" type="email"
                             value="{{ $customer->email }}" placeholder="Email" required>
                        </div>

                        <div class="col-span-2">
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Số điện thoại
                            </label>
                            <div class="tag-field-phone js-tags-phone">
                                <input class="js-tag-input-phone" placeholder="Số điện thoại liên lạc" id="textInputPhone"
                                    name="contact_phone"
                                    value=""/>
                                @foreach (explode(',', $new->contact_phone) as $phone)
                                    <div class="tag js-tag" data-index="{{ $loop->index }}">
                                        <input value="{{ $new->contact_phone }}" class="hidden" name="contact_phone">{{ $phone }}
                                        <span class="tag-close js-tag-close" data-index="{{ $loop->index }}">×</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label class="block  text-base font-bold mb-2 text-black" >
                                Địa chỉ
                            </label>
                            <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                             id="address" name="address" type="text"
                             value="{{ $customer->address }}" placeholder="Địa chỉ" required>
                        </div>
                    </div>
                </div>

                <button class="border rounded-xl mb-10 text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                    Đăng tin
                </button>

                <script type="text/javascript" src="{{ asset('js/backend/inputTag.js') }}"></script>

                <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">

                <script>
                    $(window).ready(function() {
                    $("#form-id").on("keypress", function (event) {
                        var keyPressed = event.keyCode || event.which;
                        if (keyPressed === 13) {
                            event.preventDefault();
                            return false;
                        }
                    });
                    });
                </script>
            </div>

            <div class="w-1/4 border rounded-xl bg-white p-7" style="height: 540px">
                <div class="mb-4">
                    <label for="" class="text-black">Loại tin đăng</label>
                    <select
                        name="loai_tin"
                        id="loai_tin"
                        class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none">
                        <option value="{{ $new->id_type }}">{{ $new->newsType->name }}</option>
                        @foreach ($loai_tin as $lt)
                            <option value="{{ $lt->id }}">{{ $lt->name }}</option>
                        @endforeach
                    </select>
                </div>

                <script type="text/javascript">
                    $('#loai_tin').on('change', function() {
                        get_price();
                    });
                    function get_price(){
                        var loai_tin_id = $('#loai_tin').val();
                        $.post('{{route('admin.getNewsPrice')}}',{_token:'{{ csrf_token() }}', loai_tin:loai_tin_id}, function(data){
                            $('#loai_tin_price').html(null);
                            $('#loai_tin_price').append($('<div id="loai_tin_price">Don gia/ngay:</div>', {
                            }));

                            $( "#loai_tin_price" ).append( `<span id="price">${data[0].gia}</span>`);
                            var totalPrice = document.getElementById('totalPrice');

                            let price = document.getElementById('price').textContent || document.getElementById('price').innerText;

                            var current = document.getElementById('startTime').value;

                            var end = document.getElementById('endTime').value;

                            var date1 = new Date(current);

                            var date2 = new Date(end);

                            var diffTime = Math.abs(date2 - date1);

                            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                            var showDay = document.getElementById('diffDay');

                            showDay.innerHTML =  diffDays;

                            totalPrice.innerHTML = diffDays*price;
                        });
                    }
                </script>

                <div class="mb-4">
                    <label for="" class="text-black">Ngày bắt đầu</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-primary-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                leading-tight focus:outline-none focus:shadow-outline text-black block pl-10 p-2.5" type="text"
                                id="startTime" name="startTime" value="{{ $new->startTime }}" onchange="diffDay()"
                                onfocus="(this.type='date')"
                                onfocusout="(this.type='text')">
                    </div>
                </div>

                <div class="mb-4 border-b border-gray-400 pb-4">
                    <label for="" class="text-black">Ngày kết thúc</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-primary-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                leading-tight focus:outline-none focus:shadow-outline text-black block pl-10 p-2.5" type="text"
                                id="endTime" name="endTime" value="{{ $new->endTime }}" onchange="diffDay()"
                                onfocus="(this.type='date')"
                                onfocusout="(this.type='text')">
                    </div>
                </div>

                <div id="loai_tin_price" class="flex mb-4 text-black">
                    Đơn giá/ngày: <span id="price">{{ $new->newsType->gia }}</span>
                </div>

                <div class="mb-4 text-black">
                    Số ngày: <span id="diffDay"></span>
                </div>

                <div style="color: #EF562D;" class="text-lg font-semibold border-b pb-3 border-gray-400 mb-4">
                    Số tiền: <span id="totalPrice" class=" text-sm"></span> <span class="text-sm"> VND</span>
                </div>

                <div class="text-sm font-medium text-black">
                    Lưu ý
                </div>
                <i class="text-xs text-black">
                    Bạn sẽ chuyển tiền đến tài khoản và tin đăng sẽ được kiểm duyệt ngay sau đó .
                </i>

                <script>
                    function diffDay(){
                        var totalPrice = document.getElementById('totalPrice');

                        let price = document.getElementById('price').textContent || document.getElementById('price').innerText;

                        var current = document.getElementById('startTime').value;

                        var end = document.getElementById('endTime').value;

                        var date1 = new Date(current);

                        var date2 = new Date(end);

                        var diffTime = Math.abs(date2 - date1);

                        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                        var showDay = document.getElementById('diffDay');

                        showDay.innerHTML =  diffDays;

                        totalPrice.innerHTML = diffDays*price;
                    }
                    var totalPrice = document.getElementById('totalPrice');

                    var price = document.getElementById('price').textContent || document.getElementById('price').innerText;

                    var current = document.getElementById('startTime').value;

                    var end = document.getElementById('endTime').value;

                    var date1 = new Date(current);

                    var date2 = new Date(end);

                    var diffTime = Math.abs(date2 - date1);

                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    var showDay = document.getElementById('diffDay');

                    showDay.innerHTML =  diffDays;

                    totalPrice.innerHTML = diffDays*price;
                </script>
            </div>
        </form>
    </main>

    <script type="text/javascript">
        $('#hinhthuc').on('change', function() {
            get_loai_hinh_thuc();
        });
        function get_loai_hinh_thuc(){
            var hinhthuc_id = $('#hinhthuc').val();
            $.post('{{route('admin.getFormType')}}',{_token:'{{ csrf_token() }}', hinhthuc:hinhthuc_id}, function(data){
                $('#loai_hinhthuc').html(null);
                $('#loai_hinhthuc').append($('<option value="">Loại bất động sản</option>', {
                }));
                for (var i = 0; i < data.length; i++) {
                    $('#loai_hinhthuc').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name,
                        id: 'type' + data[i].id
                    }));
                }
            });
        }
    </script>

    <script type="text/javascript">
        $('#hinhthuc').on('change', function() {
            get_don_vi();
        });
        function get_don_vi(){
            var hinhthuc_id = $('#hinhthuc').val();
            $.post('{{route('admin.getUnit')}}',{_token:'{{ csrf_token() }}', hinhthuc:hinhthuc_id}, function(data){
                $('#don_vi').html(null);
                $('#don_vi').append($('<option value="">Chọn đơn vị</option>', {
                }));
                for (var i = 0; i < data.length; i++) {
                    $('#don_vi').append($('<option>', {
                        value: data[i].id,
                        text: data[i].donvi
                    }));
                }
            });
        }
    </script>

    <script type="text/javascript">
        $('#city').on('change', function() {
                get_district_by_city();
            });
        function get_district_by_city(){
            var city_id = $('#city').val();
            $.post('{{route('getDistricts')}}',{_token:'{{ csrf_token() }}', matp:city_id}, function(data){
                $('#district').html(null);
                $('#district').append($('<option value="">Chọn quận/huyện</option>', {
                }));
                for (var i = 0; i < data.length; i++) {
                    $('#district').append($('<option>', {
                        value: data[i].maqh,
                        text: data[i].name
                    }));
                }
            });
        }
    </script>

    <script type="text/javascript">
        $('#district').on('change', function() {
                get_ward_by_district();
            });
        function get_ward_by_district(){
            var district_id = $('#district').val();
            $.post('{{route('getWards')}}',{_token:'{{ csrf_token() }}', maqh:district_id}, function(data){
                $('#ward').html(null);
                $('#ward').append($('<option value="">Chọn phường/xã</option>', {
                }));
                for (var i = 0; i < data.length; i++) {
                    $('#ward').append($('<option>', {
                        value: data[i].xaid,
                        text: data[i].name
                    }));
                }
            });
        }
    </script>

    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value--;
            if (value < 0) {
                target.value = 0;
            } else {
                target.value = value;
            }
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }
        onLoad();

        function onLoad() {
            const decrementButtons = document.querySelectorAll(
                `button[data-action="decrement"]`
            );

            const incrementButtons = document.querySelectorAll(
                `button[data-action="increment"]`
            );

            decrementButtons.forEach(btn => {
                btn.addEventListener("click", decrement);
            });

            incrementButtons.forEach(btn => {
                btn.addEventListener("click", increment);
            });
        }
    </script>

    <script>
        function displayFormType(){
            var optLand1 = document.getElementById("type5");
            var optLand2 = document.getElementById("type6");
            var optLand3 = document.getElementById("type7");
            var optLand4 = document.getElementById("type8");

            var house_detail_only = document.getElementById("house_detail_only");
            var house_huong_ban_cong = document.getElementById("house_huong_ban_cong");
            var house_noi_that = document.getElementById("house_noi_that");

            if(optLand1.selected == true || optLand2.selected == true || optLand3.selected == true || optLand4.selected == true){
                house_detail_only.classList.add('invisible');
                house_huong_ban_cong.classList.add('invisible');
                house_noi_that.classList.add('invisible');
            }
            else{
                house_detail_only.classList.remove('invisible');
                house_huong_ban_cong.classList.remove('invisible');
                house_noi_that.classList.remove('invisible');
            }
        }
    </script>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
