@extends('admin.app')

@section('title')
<title>Land</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Land | Add</h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.land.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Thành phố
                            <span class=" text-base">*</span>
                        </label>
                        <select name="city" id="city" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                            <option value="">Chọn thành phố</option>
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
                            <option value="">Chọn quận/huyện</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Xã phường thị trấn
                        </label>
                        <select name="ward" id="ward" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                            <option value="">Chọn phường/xã</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-1" >
                            Tên đường
                            <span class=" text-base">*</span>
                        </label>
                        <input class="border border-gray-300 rounded outline-none text-black py-2 px-3 w-full text-sm" id="ten_duong" name="ten_duong" type="text" placeholder="Nhập tên đường" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Mô tả
                        <span class=" text-base">*</span>
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3
                            leading-tight focus:outline-none focus:shadow-outline text-dark"
                        id="ckeditor" name="mo_ta" rows="5" placeholder="Nhập mô tả" required></textarea>
                </div>

                <script src="{{ asset('js/ckeditor.js') }}"></script>

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                    Diên tích (m²)
                    <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark" id="dientich" name="dientich" type="number" min="1" placeholder="Nhập diện tích" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Mặt tiền (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark" id="mat_tien" name="mat_tien" type="number" min="1" placeholder="Mặt tiền">
                    </div>

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Đường vào (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark" id="duong_vao" name="duong_vao" type="number" min="1" placeholder="Đường vào">
                    </div>

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                        Hướng nhà
                        </label>
                        <select name="huong_nha" id="huong_nha" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark" id="phap_ly" name="phap_ly" type="text" placeholder="Pháp lý">
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

                <div class="flex items-center justify-between">
                    <button class=" border-2 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline dark:hover:bg-primary-darker hover:bg-gray-300" type="submit">
                        Thêm mới
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
    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
