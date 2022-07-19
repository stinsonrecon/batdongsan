@extends('front-end.app')
@section('content')

<form method="POST" action="{{ route('account.index') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 bg-gray-100">
        @include('front-end.components.banner-news')
        <div class="justify-between md:mx-12 flex">
            <div class="hidden lg:block w-1/6 mt-24">
                <img src="{{ asset('images/front-end/quang-cao-1.png') }}"alt="">
            </div>
            <div class="w-full lg:w-2/3">
                <div class="mt-10 text-center text-orange-600 font-bold text-xl">
                    @if (session('yes'))
                    <div class="alert alert-success">
                        <p>{{ session('yes') }}</p>
                    </div>
                    @endif
                    @if (session('success'))
                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                            @endif
                    Thông tin cá nhân
                </div>
                <div class="md:mx-12 p-2 drop-shadow-md bg-white mt-7 mb-5 rounded-md">
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Họ và tên</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text" 
                            id="full_name" name="full_name"
                            value="{{ Auth::user()->full_name }}" readonly>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-3 sm:mt-8 font-bold">Địa chỉ Email</div>
                        <div class="md:w-2/3 md:pr-16">
                            <input class="w-full pl-4 md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text" 
                            id="email" name="email" type="email"
                            value="{{ $customer->email }}" readonly>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Thay đổi mật khẩu</div>
                        <div class="md:w-1/2 md:mt-8 md:pr-16">
                            <a href="{{ route('account.password.edit') }}" class="text-orange-600 hover:text-gray-500 font-bold">Chỉnh sửa</a>
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
                        <div class="md:w-1/2 md:mt-8 md:pr-16">
                            <a href="{{ route('account.info.edit') }}" class="text-orange-600 hover:text-gray-500 font-bold">Chỉnh sửa</a>
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
                                value="{{ $customer->phone_number }}" readonly>
                            </div>
                        </div>
                        <div class="md:flex mx-3">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Ngày sinh</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" 
                                id="DoB" name="DoB" 
                                value="{{ $customer->DoB }}" readonly
                                type="date">
                            </div>
                        </div>
                        <div class="md:flex mx-3">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Địa chỉ</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" 
                                id="phone_number" name="phone_number" type="text"
                                value="{{ Auth::user()->address }}" readonly>
                            </div>
                        </div>
                        <div class="md:flex mb-4 mx-3 md:mb-16">
                            <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">CCCD</div>
                            <div class="md:w-3/4 sm:w-2/3 md:pr-16">
                                <input class="w-full md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" 
                                id="phone_number" name="phone_number" type="number"
                                value="{{ $customer->SSN }}" readonly>
                            </div>
                        </div>
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
