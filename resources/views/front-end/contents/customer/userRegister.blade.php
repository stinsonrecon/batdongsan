@extends('front-end.app')
@section('content')
<form method="POST" action="{{ route('client.register.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 pt-10 pb-20" style="background: #E5E5E5;">
        <div class="px-10 py-6 flex-col justify-center w-11/12 md-7/12 xl:w-5/12 bg-white m-auto rounded" style="color: #383838;">
            <div class="font-bold text-lg text-center" style="color: #EF562D">Đăng ký</div>
            {{-- username --}}
            <div class="mt-6 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text" id="username" name="username"
                        placeholder="Tên tài khoản" style="border:solid 1px #BABABA"
                        value="{{old('username')}}" required>
                @error('username')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- email --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" id="email" name="email" type="email"
                        placeholder="Địa chỉ email" style="border:solid 1px #BABABA"
                        value="{{old('email')}}" required>
                @error('email')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- password --}}
            <div class="mt-3 m-auto w-5/6 flex justify-between">
                <div>
                    <input class="placeholder:text-sm px-3 rounded w-11/12 h-8" id="password" name="password" type="password"
                            placeholder="Mật khẩu" style="border:solid 1px #BABABA">
                    @error('password')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{-- confirm password --}}
                <div class="flex justify-end">
                    <input class="placeholder:text-sm px-3 rounded w-11/12 h-8"
                        id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Nhập lại mật khẩu" style="border:solid 1px #BABABA">
                </div>
            </div>
            <div class="w-5/6 m-auto font-bold mt-6" style="color: #696969; font-family: Raleway;">Thông tin người dùng
            </div>
            {{-- full_name --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text" id="full_name" name="full_name"
                        placeholder="Họ tên đầy đủ" style="border:solid 1px #BABABA"
                        value="{{old('full_name')}}" required>
                @error('full_name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- phone_number --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8"
                        id="phone_number" name="phone_number" type="number" minlength="10" maxlength="11"
                        placeholder="Số điện thoại" style="border:solid 1px #BABABA"
                        value="{{old('phone_number')}}">
            </div>
            {{-- DoB --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text"
                        id="DoB" name="DoB" value="{{old('DoB')}}"
                        placeholder="Ngày sinh" style="border:solid 1px #BABABA" onfocus="(this.type='date')"
                        onfocusout="(this.type='text')" required>
                @error('DoB')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- tinhthanhpho --}}
            <div class="mt-3 text-center">
                <select name="city" id="city"
                        class="placeholder:text-sm px-3 rounded w-5/6 h-8"
                        style="border:solid 1px #BABABA"
                        onchange="appendCity(this)">
                    <option value="">Chọn thành phố</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->matp }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- quanhuyen --}}
            <div class="mt-3 text-center">
                <select name="district" id="district"
                        class="placeholder:text-sm px-3 rounded w-5/6 h-8"
                        style="border:solid 1px #BABABA"
                        onchange="appendDistric(this)">
                    <option value="">Chọn quận/huyện</option>
                </select>
            </div>
            {{-- xaphuongthitran --}}
            <div class="mt-3 text-center">
                <select name="ward" id="ward"
                        class="placeholder:text-sm px-3 rounded w-5/6 h-8"
                        style="border:solid 1px #BABABA"
                        onchange="appendWard(this)">
                    <option value="">Chọn phường/xã</option>
                </select>
            </div>
            {{-- address --}}
            <div class="mt-3 text-center">
                <div class="relative text-black focus-within:text-gray-400">
                    <span class="absolute inset-y-0 right-10 flex items-center pr-2">
                        <button type="button" class="focus:outline-none focus:shadow-outline hover:text-black"
                            onclick="document.getElementById('address').value = ''">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </span>
                    <input class="placeholder:text-sm px-3 rounded w-5/6 h-8"
                            type="text" id="address" name="address"
                            placeholder="Địa chỉ" style="border:solid 1px #BABABA" required>
                </div>
            </div>
            {{-- <div class="mt-3 w-5/6 m-auto flex">
                <div class="font-bold w-1/3 md:w-1/4" style="color: #696969; font-family: Raleway;">Giới tính:</div>
                <div class="w-1/3 md:w-1/4">
                    <input type="radio" name="gender" id="" style="accent-color: gray;">
                    Nam
                </div>
                <div>
                    <input type="radio" name="gender" id="" style="accent-color: gray;">
                    Nữ
                </div>
            </div>
            <div class="mt-3 w-5/6 m-auto flex">
                <div class="font-bold w-1/3 md:w-1/4" style="color: #696969; font-family: Raleway;">Bạn là:</div>
                <div class="w-1/3 md:w-1/4">
                    <input type="radio" name="gender" id="" style="accent-color: gray;">
                    Cá nhân
                </div>
                <div>
                    <input type="radio" name="gender" id="" style="accent-color: gray;">
                    Doanh nghiệp
                </div>
            </div> --}}

            {{-- cmtnd/cccd --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text"
                    id="SSN" name="SSN"
                    placeholder="Nhập số chứng minh nhân dân/ căn cước công dân" style="border:solid 1px #BABABA"
                    value="{{old('SSN')}}" required>
                @error('SSN')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="w-5/6 m-auto font-bold mt-6" style="color: #696969; font-family: Raleway;">Ảnh căn cước/chứng minh thư
            </div>
            {{-- cccd front --}}
            <div class="mt-3 text-center">
                <label class="block text-sm font-bold mb-3" style="color: #696969; font-family: Raleway;">
                    Ảnh chứng minh thư mặt trước
                </label>
                <div class="flex justify-center items-center">
                    <div class="relative h-40 rounded-lg border-dashed border-2 border-black flex justify-center items-center hover:cursor-pointer w-5/6">
                        <div class="absolute" id="ssn_front_container">
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
                        <input class="h-full w-full opacity-0" id="SSN_front" name="SSN_front" type="file"
                            onchange="ssn_front_select()">
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/ssnFrontPreview.js') }}"></script>

            @error('SSN_front')
            <div style="color: red;">
                {{$message}}
            </div>
            @enderror
            {{-- cccd back --}}
            <div class="mt-3 text-center">
                <label class="block  text-sm font-bold mb-3" style="color: #696969; font-family: Raleway;">
                    Ảnh chứng minh thư mặt sau
                </label>
                <div class="flex justify-center items-center">
                    <div class="relative h-40 rounded-lg border-dashed border-2 border-black flex justify-center items-center hover:cursor-pointer w-5/6">
                        <div class="absolute"  id="ssn_back_container">
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
                        <input type="file" class="h-full w-full opacity-0" name="SSN_back" id="SSN_back" onchange="ssn_back_select()">
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/ssnBackPreview.js') }}"></script>

            @error('SSN_back')
            <div style="color: red;">
                {{$message}}
            </div>
            @enderror

            <div class="mt-3 m-auto w-5/6 text-xs">
                <input type="checkbox" class="mr-1" style="accent-color: #f97316;" required>
                Tôi đồng ý với các điều khoản, điều kiện & chính sách
            </div>

            <div class="mt-5 w-5/6 m-auto">
                <input type="submit"
                    class="text-white w-full py-1 px-2 bg-orange-600 rounded-md text-center hover:bg-orange-500"
                    value="Đăng ký" style="font-family: Raleway">
            </div>
            <div class="mt-3 m-auto w-5/6 text-xs">
                <div><span class="font-bold">Chú ý: </span>Thông tin Tên tài khoản, email không thể thay đổi sau khi
                    đăng ký.</div>
                <div>Để được trợ giúp vui lòng liên hệ tổng đài CSKH <span style="color: #EF562D;">19001881</span> hoặc
                    email hỗ trợ <span style="color: #EF562D;">hotro@batdongsan.com</span></div>
            </div>
        </div>
    </div>
</form>
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
    function appendCity(e) {
        document.getElementById("address").value = "";

        document.getElementById("address").value += e.options[e.selectedIndex].text;
    }

    function appendDistric(e){
        const oldVal = document.getElementById("city").options[document.getElementById("city").selectedIndex].text;

        document.getElementById("address").value = oldVal;

        document.getElementById("address").value += ", " + e.options[e.selectedIndex].text;
    }

    function appendWard(e){
        const oldVal = document.getElementById("city").options[document.getElementById("city").selectedIndex].text + ", " +
                    document.getElementById("district").options[document.getElementById("district").selectedIndex].text;

        document.getElementById("address").value = oldVal;

        document.getElementById("address").value += ", " + e.options[e.selectedIndex].text;
    }
</script>
@endsection
