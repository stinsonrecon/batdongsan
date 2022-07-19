@extends('front-end.app')
@section('content')
<div class="flex-col xl:flex xl:flex-row mt-20 justify-between py-10" style="background-color: #E9E9E9;">
    {{-- Left side bar --}}
    <div class="w-1/6"></div>
    {{-- Bank list center --}}
    <div class="w-11/12 m-auto xl:w-1/2">
        <div class="rounded bg-white shadow-md  flex-col pb-10 pt-6 px-4 xl:px-10 text-center">
            <div class="text-2xl font-bold" style="color: #EF562D">Thanh toán</div>
            <div class="mt-4 font-bold text-left">Khách hàng chuyển khoản vào các tài khoản sau để thanh toán</div>
            <form class="flex-col xl:flex xl:flex-row flex-wrap justify-between mt-10">
                <input class="hidden" id="radio_1" type="radio" name="radio" checked onclick="displayBank()">
                <label class="flex cursor-pointer flex-col bankBox mb-6 py-10 px-6 xl:px-10 rounded shadow-md" for="radio_1">
                    <div>
                        <img src="{{ asset('images/front-end/banks/vietcombank.png') }}" alt="">
                    </div>
                    <div class="mt-4 text-left font-medium">STK: <span id="stk_1">0031000388711</span></div>
                    <div class="hidden" id="bankName_1">
                        Vietcombank
                    </div>
                    <div class="text-left font-medium">Chủ tài khoản: Nguyễn Trung Hiếu</div>
                </label>

                <input class="hidden" id="radio_2" type="radio" name="radio" onclick="displayBank()">
                <label class="flex cursor-pointer flex-col bankBox mb-6 py-10 px-6 xl:px-10 rounded shadow-md" for="radio_2">
                    <div>
                        <img src="{{ asset('images/front-end/banks/techcombank.png') }}" alt="">
                    </div>
                    <div class="mt-4 text-left font-medium">STK: <span id="stk_2">0031000388712</span></div>
                    <div class="hidden" id="bankName_2">
                        Techcombank
                    </div>
                    <div class="text-left font-medium">Chủ tài khoản: Nguyễn Trung Hiếu</div>
                </label>

                <input class="hidden" id="radio_3" type="radio" name="radio" onclick="displayBank()">
                <label class="flex cursor-pointer flex-col bankBox mb-6 py-10 px-6 xl:px-10 rounded shadow-md" for="radio_3">
                    <div>
                        <img src="{{ asset('images/front-end/banks/sacombank.png') }}" alt="">
                    </div>
                    <div class="mt-4 text-left font-medium">STK: <span id="stk_3">0031000388713</span></div>
                    <div class="hidden" id="bankName_3">
                        Sacombank
                    </div>
                    <div class="text-left font-medium">Chủ tài khoản: Nguyễn Trung Hiếu</div>
                </label>

                <input class="hidden" id="radio_4" type="radio" name="radio" onclick="displayBank()">
                <label class="flex cursor-pointer flex-col bankBox mb-6 py-10 px-6 xl:px-10 rounded shadow-md" for="radio_4">
                    <div>
                        <img src="{{ asset('images/front-end/banks/BIDV.png') }}" alt="">
                    </div>
                    <div class="mt-4 text-left font-medium">STK: <span id="stk_4">0031000388714</span></div>
                    <div class="hidden" id="bankName_4">
                        BIDV
                    </div>
                    <div class="text-left font-medium">Chủ tài khoản: Nguyễn Trung Hiếu</div>
                </label>
            </form>
            <div class=" border-t-2 border-b-2 border-orange-600 py-3 text-left text-lg">
                <span class=" font-semibold">Chuyển khoản với nội dung:</span> <span class="font-semibold" style="color: #EF562D">{{ $idBanking }}</span> vào số tài khoản
                <span class="font-semibold" id="stk_bill">0031000388711</span> ngân hàng <span class="font-semibold" id="bankName_bill">Vietcombank</span>.
                <div>Tin của quý khách hàng sẽ được cập nhật sớm nhất có thể</div>
            </div>
        </div>
        <form action="{{ route('client.news.store') }}" method="POST" class="pt-5">
            @csrf
            <button class="border rounded-xl text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                Đăng tin
            </button>
        </form>
    </div>

    {{-- right side bar --}}
    <div class="w-1/6 border rounded-xl bg-white p-7" style="height: 540px">
        @include('front-end.components.newsFormBill')
    </div>

    <script>
        function displayBank(){
            var r1 = document.getElementById("radio_1");
            var r2 = document.getElementById("radio_2");
            var r3 = document.getElementById("radio_3");
            var r4 = document.getElementById("radio_4");

            var stk1 = document.getElementById('stk_1').textContent;
            var stk2 = document.getElementById('stk_2').textContent;
            var stk3 = document.getElementById('stk_3').textContent;
            var stk4 = document.getElementById('stk_4').textContent;

            var bankName1 = document.getElementById('bankName_1').textContent;
            var bankName2 = document.getElementById('bankName_2').textContent;
            var bankName3 = document.getElementById('bankName_3').textContent;
            var bankName4 = document.getElementById('bankName_4').textContent;

            var stk_bill = document.getElementById('stk_bill');
            var bankNameBill = document.getElementById('bankName_bill');

            if(r1.checked == true){
                stk_bill.innerHTML = stk1
                bankNameBill.innerHTML = bankName1
            }
            else if(r2.checked == true) {
                stk_bill.innerHTML = stk2
                bankNameBill.innerHTML = bankName2
            }
            else if(r3.checked == true) {
                stk_bill.innerHTML = stk3
                bankNameBill.innerHTML = bankName3
            }
            else if(r4.checked == true) {
                stk_bill.innerHTML = stk4
                bankNameBill.innerHTML = bankName4
            }
        }
    </script>
</div>
@endsection
