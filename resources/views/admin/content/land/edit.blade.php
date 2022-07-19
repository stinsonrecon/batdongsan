@extends('admin.app')

@section('title')
<title>Land</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Land | Edit</h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.land.update', ['id' => $land->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Thành phố
                            <span class=" text-base">*</span>
                        </label>
                        <select name="city" id="city" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                            <option value="{{ $land->matp }}">{{ $land->city->name }}</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->matp }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Quận huyện
                            <span class=" text-base">*</span>
                        </label>
                        <select name="district" id="district" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                            <option value="{{ $land->maqh }}">{{ $land->district->name }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Xã phường thị trấn
                        </label>
                        <select name="ward" id="ward" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                            @if ($land->xaid != null)
                                <option value="{{ $land->xaid }}">{{ $land->ward->name }}</option>
                            @else
                                <option value="">Chọn phường/xã</option>
                            @endif
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-1" >
                            Tên đường
                            <span class=" text-base">*</span>
                        </label>
                        <input class="border border-gray-300 rounded outline-none
                                     text-black py-2 px-3 w-full text-sm"
                                id="ten_duong" name="ten_duong" type="text" placeholder="Nhập tên đường"
                                value="{{ $land->ten_duong }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Mô tả
                        <span class=" text-base">*</span>
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3
                            leading-tight focus:outline-none focus:shadow-outline text-dark"
                        id="ckeditor" name="mo_ta" rows="5" placeholder="Nhập mô tả" required>{{ $land->mo_ta }}</textarea>
                </div>

                <script src="{{ asset('js/ckeditor.js') }}"></script>

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                    Diên tích (m²)
                    <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3
                                  leading-tight focus:outline-none focus:shadow-outline text-dark"
                            id="dientich" name="dientich" type="number" min="1" placeholder="Nhập diện tích"
                            value="{{ $land->dientich }}" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Mặt tiền (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                      leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="mat_tien" name="mat_tien" type="number" min="1" placeholder="Mặt tiền"
                                value="{{ $land->mat_tien }}">
                    </div>

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Đường vào (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                     leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="duong_vao" name="duong_vao" type="number" min="1" placeholder="Đường vào"
                                value="{{ $land->duong_vao }}">
                    </div>

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Hướng nhà
                        </label>
                        <select name="huong_nha" id="huong_nha"
                                class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                            <option value="{{ $land->huong_nha }}" selected>
                                @switch($land->huong_nha)
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
                </div>

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                    Pháp lý
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3
                                  leading-tight focus:outline-none focus:shadow-outline text-dark"
                            id="phap_ly" name="phap_ly" type="text" placeholder="Pháp lý"
                            value="{{ $land->phap_ly }}">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold mb-3">
                        Ảnh/Video
                    </label>
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
                        <input class="h-full w-full opacity-0" id="linkImg" name="linkImg[]" type="file" multiple="multiple">
                    </div>
                </div>

                @if ($land->linkImg != null)
                    <div class="dark:text-primary-darker text-xl font-bold pb-10">
                        @if (sizeof($land->linkImg) > 1)
                            <div class="product-slider relative flex flex-wrap justify-around w-full"
                                id="productList">
                                <div class="splide__arrows hidden lg:block">
                                    <button type="button"
                                        class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white bg-gray-300">
                                        <i class="fas fa-caret-left"></i>
                                    </button>
                                    <button type="button"
                                        class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white bg-gray-300">
                                        <i class="fas fa-caret-right"></i>
                                    </button>
                                </div>
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($land->linkImg as $img)
                                            <li class="text-center splide__slide px-3">
                                                <img class="" src="{{ asset('storage/file') . '/' . $img }}" alt="">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <img class="" src="{{ asset('storage/file') . '/' . ($land->linkImg)[0] }}" alt="">
                        @endif
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <button class=" border-2 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline dark:hover:bg-primary-darker hover:bg-gray-300" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>

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
    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
