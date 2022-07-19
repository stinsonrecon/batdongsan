@extends('admin.app')

@section('title')
<title>Customer manager</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Customer | Edit</h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.customer.update', ['id' => $customer->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" >
                        Họ tên đầy đủ
                        <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                leading-tight focus:outline-none focus:shadow-outline text-dark" 
                    id="full_name" name="full_name" type="text" placeholder="Nhập tên" 
                    value="{{ $customer->full_name }}" required>
                </div>
                @error('full_name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block text-sm font-bold mb-2" >
                            CMTND/CCCD
                            <span class=" text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="SSN" name="SSN" type="text" placeholder="Nhập số chứng minh nhân dân/ căn cước công dân"
                                value="{{ $customer->SSN }}">
                    </div>
                    @error('SSN')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Ngày tháng năm sinh
                            <span class="text-base">*</span>
                        </label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-primary-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide datepicker-format="yyyy/mm/dd" type="text" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-black block pl-10 p-2.5"
                                    placeholder="Nhập ngày tháng năm sinh"
                                    id="DoB" name="DoB" value="{{ $customer->DoB }}" required>
                        </div>
                        <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>  
                    </div>
                    @error('DoB')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
             
                <div class="mb-6 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Thành phố
                        </label>
                        <select name="city" id="city"
                                class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full"
                                onchange="appendCity(this)">
                            <option value="">Chọn thành phố</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->matp }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Quận huyện
                        </label>
                        <select name="district" id="district"
                                class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full"
                                onchange="appendDistric(this)">
                            <option value="">Chọn quận/huyện</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Xã phường thị trấn
                        </label>
                        <select name="ward" id="ward"
                                class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full"
                                onchange="appendWard(this)">
                            <option value="">Chọn phường/xã</option>
                        </select>
                    </div>

                    <div>
                        <label class="block  text-sm font-bold mb-2" >
                            Địa chỉ
                        </label>
                        <div class="relative text-black focus-within:text-gray-400">
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <button type="button" class="focus:outline-none focus:shadow-outline hover:text-black"
                                    onclick="document.getElementById('address').value = ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </span>
                            <input type="text" id="address" name="address"
                                    class="border border-gray-300 rounded outline-none text-black py-1.5 px-3 w-full focus:outline-none focus:text-gray-900"
                                    placeholder="Địa chỉ"
                                    value="{{ $customer->address }}">
                        </div>
                    </div>
                </div>
                
                 <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Số điện thoại
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                leading-tight focus:outline-none focus:shadow-outline text-dark"
                    id="phone_number" name="phone_number" type="number" minlength="10" maxlength="11"
                    value="{{ $customer->phone_number }}" placeholder="Nhập số điện thoại">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block text-sm font-bold mb-2" >
                            Tên đăng nhập
                            <span class=" text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="username" name="username" type="text" placeholder="Nhập tên đăng nhập"
                                value="{{ $customer->username }}" required>
                    </div>
                    @error('username')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Email
                            <span class="text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="email" name="email" type="email" placeholder="Nhập email"
                                value="{{ $customer->email }}" required>
                    </div>
                    @error('email')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                 
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Thay đổi password
                            <span class=" text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="password" name="password" type="password" placeholder="Nhập mật khẩu">
                    </div>
                    @error('password')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-3" >
                            Xác thực mật khẩu
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="password_confirmation" name="password_confirmation" type="password" placeholder="Xác thực mật khẩu">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-3">
                            Ảnh chứng minh thư mặt trước
                        </label>
                        <div class="rounded-lg border-dashed border-2 border-black dark:border-primary-dark flex justify-center items-center">
                            <img class="" src="{{ asset('storage/ssn_front') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_front }}" alt="">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-3">
                            Ảnh chứng minh thư mặt sau
                        </label>
                        <div class="rounded-lg border-dashed border-2 border-black dark:border-primary-dark flex justify-center items-center">
                            <img class="" src="{{ asset('storage/ssn_back') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_back }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-3">
                            Gửi lại ảnh chứng minh thư mặt trước
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
                            <input type="file" class="h-full w-full opacity-0" name="SSN_front" id="SSN_front">
                        </div>
                    </div>
                    @error('SSN_front')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
    
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-3">
                            Gửi lại ảnh chứng minh thư mặt sau
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
                            <input type="file" class="h-full w-full opacity-0" name="SSN_back" id="SSN_back">
                        </div>
                    </div>
                    @error('SSN_back')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>

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
    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection