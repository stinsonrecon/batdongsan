@extends('front-end.app')
@section('content')

<form method="POST" action="{{ route('account.info.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 bg-gray-100">
        @include('front-end.components.banner-news')
        <div class="justify-between md:mx-12 flex">
            <div class="hidden lg:block w-1/6 mt-24">
                <img src="{{ asset('images/front-end/quang-cao-1.png') }}"alt="">
            </div>
            <div class="w-full lg:w-2/3">
                <div class="mt-10 text-center text-orange-600 font-bold text-xl">
                    Thông tin cá nhân
                </div>
                <div class="md:mx-12 p-2 drop-shadow-md bg-white mt-7 mb-5 rounded-md">
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Họ và tên</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="full_name" name="full_name"
                            value="{{ Auth::user()->full_name }}" readonly>
                            <div class="text-sm text-gray-400 pt-2">Bạn sẽ không thể thay đổi tên của mình vì một số những quy định liên quan đến việc xác thực thông tin </div>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Tên đăng nhập</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="username" name="username"
                            value="{{ Auth::user()->username }}" required>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-3 sm:mt-8 font-bold">Địa chỉ Email</div>
                        <div class="md:w-2/3 md:pr-16">
                            <input class="w-full pl-4 md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="email" name="email" type="email"
                            value="{{ $customer->email }}" required>
                            @error('email')
                            <div style="color: red;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Thay đổi mật khẩu</div>
                        <div class="md:w-1/2 md:mt-8 md:pr-16">
                            <a href="account.password.edit" class="text-orange-600 hover:text-gray-500 font-bold">Chỉnh sửa</a>
                        </div>
                    </div>
                    <div class="md:flex w-full mx-3 justify-center items-center">
                        <div class="md:w-1/3 lg:ml-12 mt-2 md:mt-8 font-bold">
                            <label class="block text-sm font-bold mb-3">
                                Ảnh chứng minh thư mặt trước
                            </label>
                            <div class="w-2/3 rounded-lg border-dashed flex justify-center items-center">
                                <img class="" src="{{ asset('storage/ssn_front') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_front }}" alt="">
                            </div>
                        </div>
                        <div class="md:w-1/3 lg:ml-12 mt-2 md:mt-8 font-bold">
                            <label class="block  text-sm font-bold mb-3">
                                Ảnh chứng minh thư mặt sau
                            </label>
                            <div class="w-2/3 rounded-lg border-dashed flex justify-center items-center">
                                <img class="" src="{{ asset('storage/ssn_back') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_back }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Ảnh CCCD</div>
                        <div>
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
                        </div>
                    </div>
                    <div class="flex sm:mr-16 mt-4">
                        <div class="lg:ml-12 w-11/12 sm:w-1/2 pl-2 text-sm sm:text-medium text-gray-400">
                            Thông tin người dùng
                        </div>
                        <div class="mt-3 w-11/12 sm:w-full border-t-2 border-gray-400"></div>
                    </div>
                    <div>
                        <div class="md:flex mx-3">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Số điện thoại</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded"
                                id="phone_number" name="phone_number" type="number" minlength="10" maxlength="11"
                                value="{{ $customer->phone_number }}" required>
                            </div>
                        </div>
                        <div class="md:flex mx-3">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Ngày sinh</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded"
                                id="DoB" name="DoB"
                                value="{{ $customer->DoB }}" type="date" required>
                                @error('DoB')
                                <div style="color: red;">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex mx-3">
                            <div class="md:w-1/4 lg:ml-12 md:mt-8 font-bold">Địa chỉ</div>
                            <div class="md:w-3/4 lg:pr-16 lg:mt-8">
                                <div class="xl:flex justify-between">
                                    <div class="xl:w-1/2 pt-1">
                                        <select name="city" id="city"
                                                class="placeholder:text-sm px-3 rounded w-5/6 border outline-none h-8"
                                                onchange="appendCity(this)">
                                            <option value="">Chọn tỉnh/TP</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->matp }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="xl:w-1/2 pt-1">
                                        <select name="district" id="district"
                                                class="placeholder:text-sm px-3 rounded w-5/6 border outline-none h-8"
                                                onchange="appendDistric(this)">
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="xl:flex justify-between lg:mt-4">
                                    <div class="xl:w-1/2 pt-1">
                                        <select name="ward" id="ward"
                                                class="placeholder:text-sm px-3 rounded w-5/6 border outline-none h-8"
                                                onchange="appendWard(this)">
                                            <option value="">Chọn phường/xã</option>
                                        </select>
                                    </div>
                                    <div class="xl:w-1/2 pt-1">
                                        <div class="relative text-black focus-within:text-gray-400">
                                            <span class="absolute inset-y-0 right-10 flex items-center pr-2">
                                                <button type="button" class="focus:outline-none focus:shadow-outline hover:text-black"
                                                    onclick="document.getElementById('address').value = ''">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </span>
                                            <input class="placeholder:text-sm px-3 rounded w-4/6 border outline-none h-8"
                                                    type="text" id="address" name="address" value="{{ Auth::user()->address}}"
                                                    placeholder="Địa chỉ" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mb-4 mx-3 md:mb-16">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">CCCD</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded"
                                id="SSN" name="SSN" type="text" placeholder="Nhập số chứng minh nhân dân/ căn cước công dân"
                                value="{{ $customer->SSN }}" required>
                                @error('SSN')
                                <div style="color: red;">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-2 mb-6 md:py-8 grid justify-items-stretch">
                    <div class="justify-self-center">
                        <input type="submit"
                        class="md:px-6 px-28 py-2 hover:bg-black rounded bg-orange-600 text-md text-white font-bold"
                        value="Lưu lại">
                    </div>
                </div>
            </div>
            <div class="hidden lg:block w-1/6 mt-24">
                <img src="{{ asset('images/front-end/quang-cao-2.png') }}"alt="">
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
