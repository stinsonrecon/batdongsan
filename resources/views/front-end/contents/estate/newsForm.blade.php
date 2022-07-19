@extends('front-end.app')
@section('content')
<div class="mt-20 flex">
    {{-- <form class="rounded px-8 pt-6 pb-8 mb-4 flex justify-between" method="POST"
    action="{{route('admin.news.store', ['id_cus' => $customer->id])}}" enctype="multipart/form-data"
    id="form-id"> --}}
    <div class="w-1/6 border rounded-xl bg-white pt-8 mt-6 ml-6" style="height: 260px">
        @include('front-end.components.side-menu')
    </div>
    <form class=" w-10/12 rounded px-8 pt-6 pb-8 mb-4 flex justify-between" method="POST"
    action="{{ route('client.news.session') }}" enctype="multipart/form-data"
    id="form-id">
        @csrf
        <div class="w-3/4 mr-10 flex-col">
            <div class="border rounded-xl bg-white p-7 mb-10">
                <div class="text-center mb-5 text-4xl font-semibold" style="color: #EF562D;">
                    Đăng tin
                </div>
                <div class="mb-4 text-lg font-medium" style="color: #696969;">
                    Thông tin cơ bản
                </div>
                <div class="mb-8 flex justify-between">
                    <select name="hinhthuc" id="hinhthuc" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none mr-2" required>
                        <option value="">Hình thức</option>
                        <option value="1">Bán</option>
                        <option value="2">Thuê</option>
                    </select>

                    <select name="loai_hinhthuc" id="loai_hinhthuc"
                        class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none ml-2"
                        onchange="displayFormType()" required>
                        <option value="">Loại bất động sản</option>
                    </select>
                </div>

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
                            <option value="">Chọn thành phố</option>
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
                            <option value="">Chọn quận/huyện</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Xã phường thị trấn
                        </label>
                        <select name="ward" id="ward" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
                            <option value="">Chọn phường/xã</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Tên đường
                            <span class=" text-base">*</span>
                        </label>
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                        id="ten_duong" name="ten_duong" type="text" placeholder="Nhập tên đường" required>
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
                            placeholder="VD: Bán nhà riêng 50m2 chính chủ Cầu Giấy" required></textarea>
                    <div style="color: #888686;" class="text-sm">
                        Tối thiểu 30 ký tự, tối đa 99 ký tự
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-base font-bold mb-2 text-black" >
                        Mô tả
                        <span class=" text-base">*</span>
                    </label>
                    <textarea name="mo_ta" id="ckeditor"
                            class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="5"
                            placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ : Khu nhà có vị trị thuận lợi, gần công viên, gần trường học"
                            required></textarea>
                    <div style="color: #888686;" class="text-sm">
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline text-black"
                    id="dientich" name="dientich" type="number" min="1" placeholder="Nhập diện tích, VD 80,100" required>
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
                            id="gia" name="gia" type="number" min="1" placeholder="Nhập mức giá, VD 12000000" required>
                    </div>

                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Đơn vị
                            <span class=" text-base">*</span>
                        </label>
                        <select name="don_vi" id="don_vi" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full" required>
                            <option value="">Chọn đơn vị</option>
                        </select>
                    </div>
                </div>

                <div class="flex  items-center mb-5" style="color: #888686;">
                    <div class="">Chi tiết</div>
                    <div class="border w-11/12 ml-1"></div>
                </div>

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
                                min="0" value="0" name="so_tang">
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
                            <input type="number"
                                class="focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                min="0" value="0" name="phong_ngu">
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
                            <input type="number"
                                class="focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                min="0" value="0" name="toilet">
                            <button data-action="increment" type="button"
                                class="cart_update h-full w-20 rounded-r cursor-pointer border-2 dark:hover:bg-primary-darker dark:hover:border-primary-darker">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="mb-4">
                        <label class="block  text-sm font-bold mb-2 text-black" >
                        Mặt tiền (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                            id="mat_tien" name="mat_tien" type="number" min="1" placeholder="Mặt tiền">
                    </div>

                    <div class="mb-4">
                        <label class="block  text-sm font-bold mb-2 text-black" >
                        Đường vào (m)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                            id="duong_vao" name="duong_vao" type="number" min="1" placeholder="Đường vào">
                    </div>

                    <div class="mb-4">
                        <label class="block  text-sm font-bold mb-2 text-black" >
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

                    <div class="mb-4" id="house_huong_ban_cong">
                        <label class="block  text-sm font-bold mb-2 text-black" >
                        Hướng ban công
                        </label>
                        <select name="huong_ban_cong" id="huong_ban_cong" class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full">
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

                <div class="mb-6" id="house_noi_that">
                    <label class="block  text-sm font-bold mb-2 text-black" >
                    Nội thất
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark"
                    id="noi_that" name="noi_that" type="text" placeholder="VD: Nội thất đầy đủ">
                </div>

                <div class="mb-6 text-black tagInputLaw">
                    <label class="block  text-sm font-bold mb-2 text-black" >
                    Pháp lý
                    </label>
                    <div class="tag-field js-tags">
                        <input class="js-tag-input" placeholder="Pháp lý" id="textInput" oninput="phapLuatTagInput()"
                        id="phap_ly", name="phap_ly"/>
                    </div>
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
                        {{-- <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                        id="contact_name" name="contact_name"
                        type="text" placeholder="Tên liên hệ"
                        value="{{ $customer->full_name }}" required> --}}
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                        id="contact_name" name="contact_name"
                        type="text" placeholder="Tên liên hệ"
                        value="{{ Auth::user()->full_name }}" required>
                    </div>

                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Email
                        </label>
                        {{-- <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="email" name="email" type="email"
                            value="{{ $customer->email }}" placeholder="Email" required> --}}
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="email" name="email" type="email"
                            value="{{ Auth::user()->email }}" placeholder="Email" required>
                    </div>

                    <div class="col-span-2 tagInputPhone">
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Số điện thoại
                        </label>
                        <div class="tag-field-phone js-tags-phone">
                            {{-- <input class="js-tag-input-phone" placeholder="Số điện thoại liên lạc" id="textInputPhone"
                                name="contact_phone"
                                value="{{ $customer->phone_number }}"/> --}}
                            <input class="js-tag-input-phone" placeholder="Số điện thoại liên lạc" id="textInputPhone"
                                name="contact_phone"
                                value="{{ Auth::user()->phone_number }}"/>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Địa chỉ
                        </label>
                        {{-- <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="address" name="address" type="text"
                            value="{{ $customer->address }}" placeholder="Địa chỉ" required> --}}
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="address" name="address" type="text"
                            value="{{ Auth::user()->address }}" placeholder="Địa chỉ" required>
                    </div>
                </div>
            </div>

            <button class="border rounded-xl mb-10 text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                Đăng tin
            </button>

            <script type="text/javascript" src="{{ asset('js/frontend/inputTag.js') }}"></script>

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
            @include('front-end.components.newsFormBill')
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#hinhthuc').on('change', function() {
        get_loai_hinh_thuc();
    });
    function get_loai_hinh_thuc(){
        var hinhthuc_id = $('#hinhthuc').val();
        $.post('{{route('client.getFormType')}}',{_token:'{{ csrf_token() }}', hinhthuc:hinhthuc_id}, function(data){
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
        $.post('{{route('client.getUnit')}}',{_token:'{{ csrf_token() }}', hinhthuc:hinhthuc_id}, function(data){
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
        $.post('{{route('client.getDistricts')}}',{_token:'{{ csrf_token() }}', matp:city_id}, function(data){
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
        $.post('{{route('client.getWards')}}',{_token:'{{ csrf_token() }}', maqh:district_id}, function(data){
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
@endsection
