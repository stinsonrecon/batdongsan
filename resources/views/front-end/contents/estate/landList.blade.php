@extends('front-end.app')
@section('content')
    <div class="mt-20">
        <div class="hidden xl:block">
            @include('front-end.components.filter')
        </div>
        <div class="w-11/12 md:w-3/4 m-auto pt-6 flex-col xl:flex xl:flex-row justify-between">
            <div class="w-full md:w-3/4 flex-col">
                <div class="text-2xl font-bold">Mua nhà toàn quốc</div>
                <div class="flex justify-between">
                    <p class="font-light text-sm text-gray-400">
                        Hiện có 10.000 bất động sản
                    </p>
                    <p>Liên quan nhất</p>
                </div>
                <!-- noi dung -->
                @foreach ($land as $land)
                    <div class="w-full myBox m-auto border border-gray-400 mt-7 flex-col xl:flex-row xl:flex justify-between mb-10 shadow">
                        <a href="/house-detail/{{ $land -> id}}" 
                        class="flex">
                            <div>
                                <img src="{{ asset('images/front-end/home-list/House.png') }}" alt="" class="w-full"/>
                            </div>
                            <div class="w-full ml-2 px-4 xl:px-0 xl:w-11/12 xl:w-7/12 mr-6">
                                <p class="font-bold text-orange-700 mb-1 mt-3">
                                    {{ $land -> title }}
                                </p>
                                <p class="text-sm mt-1 text-gray-400 font-light">
                                    {{ $land-> land ->city->name }}, {{ $land -> land ->district->name }}, @if($land-> land -> xaid != null) {{ $land -> land -> ward->name }}, @endif {{ $land -> land ->ten_duong }}
                                </p>
                                <div class="border border-gray-400 mt-2"></div>
                                <div class="h-5 mt-2 justify-between md:justify-around flex">
                                    <div class="flex">
                                        <img class="mr-2" src="{{ asset('images/front-end/home-list/Area.svg') }}"
                                            alt="" />
                                            <p>{{ $land -> land ->dientich }} m²</p>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <p class="text-gray-600">Chung cư: Giá {{ $land->gia }} tỷ</p>
                                </div>
                                <p class="mt-3">
                                    {{ $land->mo_ta }}
                                </p>
                                    <p class="mt-3">
                                        {{ $land->land->mo_ta }}
                                    </p>
                            </div>
                        </a>
                    </div>

                @endforeach
                <div class="flex justify-center text-white">
                    <button class="bg-orange-500 py-2 px-5 rounded">Xem thêm </button>
                </div>
            </div>
            <div class="hidden xl:block w-1/5 flex-col">
                <div class="border rounded px-10 pt-5 border-gray-400">
                    <p class="font-bold">Lọc theo mục giá</p>
                    <div class="mt-3 border rounded py-1 px-3 border-gray-300">
                        <p>Từ: VD 50 triệu, 2 tỷ</p>
                    </div>
                    <div class="mt-4 border rounded py-1 px-3 border-gray-300">
                        <p>7 tỷ</p>
                    </div>
                    <p class="font-bold justify-center mt-3 flex">Tìm kiếm</p>
                    <div class="border border-orange-500 mt-2"></div>
                    <div class="my-5">
                        <p class="mb-2">&#60 500 triệu</p>
                        <p class="mb-2">500 triệu - 1 tỷ</p>
                        <p class="mb-2">1 tỷ - 3 tỷ</p>
                        <p class="mb-2">3 tỷ - 5 tỷ</p>
                        <p class="mb-2">5 tỷ - 10 tỷ</p>
                        <p class="mb-2">10 tỷ - 20 tỷ</p>
                        <p class="mb-2">> 20 tỷ</p>
                    </div>
                </div>

                <div class="border rounded px-10 pt-5 border-gray-400 mt-10">
                    <p class="font-bold">Lọc theo địa điểm</p>
                    <div class="my-5">
                        <p class="mb-2">Hà Nội (500)</p>
                        <p class="mb-2">Hồ Chí Minh (1000)</p>
                        <p class="mb-2">Hải Phòng (250)</p>
                        <p class="mb-2">Đà Nẵng (250)</p>
                        <p class="mb-2">Bình Dương (150)</p>
                        <p class="mb-2">Đồng Nai (150)</p>
                        <p class="mb-2">Cần Thơ (150)</p>
                        <p class="mb-2">Nha Trang (150)</p>
                        <p class="mb-2">Vũng Tàu (150)</p>
                    </div>
                </div>

                <div class="border rounded px-10 pt-5 border-gray-400 mt-10">
                    <p class="font-bold">Lọc theo diện tích</p>
                    <div class="my-5">
                        <p class="mb-2">&#60 30m2</p>
                        <p class="mb-2">30m2 - 50m2</p>
                        <p class="mb-2">50m2 - 80m2</p>
                        <p class="mb-2">80m2 - 100m2</p>
                        <p class="mb-2">100m2 - 150m2</p>
                        <p class="mb-2">150m2 - 200m2</p>
                        <p class="mb-2">200m2 - 300m2 </p>
                        <p class="mb-2">300m2 - 500m2</p>
                        <p class="mb-2">> 500m2</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/4 m-auto">
            <div class="text-xl font-medium">Tìm kiếm phổ biến</div>
            <div class="mt-4">
                <div class="text-sm flex">
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Nhà cho thuê Hoàng Mai</div>
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Chung cư Bách Khoa</div>
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Cần tìm nhà trọ</div>
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Căn hộ cao cấp quận Cầu Giấy</div>
                    <div class="hover:underline border py-1 px-2 rounded-md">Căn hộ 3 phòng ngủ</div>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-sm flex">
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Nhà thuê dưới 10 triệu</div>
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Biệt thự Hà Nội</div>
                    <div class="hover:underline border py-1 mr-4 px-2 rounded-md">Dự án</div>
                    <div class="hover:underline border py-1 px-2 rounded-md">Chung cư giá 3 tỷ</div>
                </div>
            </div>
        </div>
    </div>
@endsection
