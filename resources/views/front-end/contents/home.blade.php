@extends('front-end.app')
@section('content')
    @include('front-end.components.banner')
    <div class="flex-col">
        <div class="black-text w-full 2xl:w-8/12 m-auto flex-col">
            {{-- Nhà --}}
            <div class="m-6 xl:m-10">
                <div class="title1 font-black">Bất động sản dành cho bạn</div>
                @include('front-end.components.estate-slider')
                <div class="mt-8 flex justify-center">
                    <div class="px-8 py-2 rounded" style="border: solid 1px #C4C4C4;">
                        <a class="text-black font-medium" href="#">Xem thêm</a>
                    </div>
                </div>
            </div>
            {{-- Tin tức --}}
            <div class="mt-8 py-6" style="background: #FAFAFA">
                <div class="flex-col mx-6 xl:mx-10">
                    <div class="title1 font-black">Tin tức mới nhất</div>
                    <div class="flex mt-8">
                        <div class="flex-col w-full xl:w-2/3">
                            <a href="{{ route('newsDetail') }}">
                                <div class="flex mb-8">
                                    <div class="w-1/2 xl:w-5/12 flex items-center">
                                        <div><img src="{{ asset('images/front-end/home/Rectangle 645.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="w-1/2 xl:w-7/12 flex-col ml-6">
                                        <div class="text-md xl:text-xl" style="color: #EF562D;">Lo ngại lạm phát sau dịch,
                                            người
                                            dân
                                            sẽ đổ tiền mua đất ? </div>
                                        <div class="hidden sm:block mt-4" style="color: #888686;">Lo ngại lạm phát gia tăng
                                            sau
                                            thời
                                            kỳ khủng hoảng vì dịch bệnh, đặc biệt là khi
                                            Chính phủ tung gói kích thích kinh tế vào năm 2022, nhiều nhà đầu tư đã bắt đầu
                                            tìm kiếm kênh đầu tư trú ẩn dòng tiền, trong đó có bất động sản.
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('newsDetail') }}">
                                <div class="flex mb-8">
                                    <div class="w-1/2 xl:w-5/12 flex items-center">
                                        <div><img src="{{ asset('images/front-end/home/Rectangle 645.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="w-1/2 xl:w-7/12 flex-col ml-6">
                                        <div class="text-md xl:text-xl" style="color: #EF562D;">Lo ngại lạm phát sau dịch,
                                            người
                                            dân
                                            sẽ đổ tiền mua đất ? </div>
                                        <div class="hidden sm:block mt-4" style="color: #888686;">Lo ngại lạm phát gia tăng
                                            sau
                                            thời
                                            kỳ khủng hoảng vì dịch bệnh, đặc biệt là khi
                                            Chính phủ tung gói kích thích kinh tế vào năm 2022, nhiều nhà đầu tư đã bắt đầu
                                            tìm kiếm kênh đầu tư trú ẩn dòng tiền, trong đó có bất động sản.
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('newsDetail') }}">
                                <div class="flex mb-8">
                                    <div class="w-1/2 xl:w-5/12 flex items-center">
                                        <div><img src="{{ asset('images/front-end/home/Rectangle 645.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="w-1/2 xl:w-7/12 flex-col ml-6">
                                        <div class="text-md xl:text-xl" style="color: #EF562D;">Lo ngại lạm phát sau dịch,
                                            người
                                            dân
                                            sẽ đổ tiền mua đất ? </div>
                                        <div class="hidden sm:block mt-4" style="color: #888686;">Lo ngại lạm phát gia tăng
                                            sau
                                            thời
                                            kỳ khủng hoảng vì dịch bệnh, đặc biệt là khi
                                            Chính phủ tung gói kích thích kinh tế vào năm 2022, nhiều nhà đầu tư đã bắt đầu
                                            tìm kiếm kênh đầu tư trú ẩn dòng tiền, trong đó có bất động sản.
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="hidden xl:flex w-1/3 justify-end">
                            <div><img src="{{ asset('images/front-end/home/Rectangle 648.png') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div><a class="font-medium" style="color:#383838;" href="#">Xem thêm →</a></div>
                    </div>
                </div>
            </div>
            {{-- Giới thiệu --}}
            <div class="xl:mt-8 py-10 xl:py-14" style="background: #383838; min-height:200px;">
                <div class="xl:mx-28 flex-col xl:flex xl:flex-row">
                    <div class="w-full xl:w-7/12 px-4 md:pl-24 xl:px-0 flex-col justify-between">
                        <div class="xl:ml-10 flex">
                            <div class="w-1/2 xl:w-1/4 font-bold text-5xl xl:text-6xl" style="color: #DD6722;">50</div>
                            <div class="w-1/2 xl:w-1/4 ml-10 text-white text-xl font-bold">Chủ đầu tư dự án</div>
                        </div>
                        <div class="mt-16 xl:mt-20 xl:ml-10 flex">
                            <div class="w-1/2 xl:w-1/4 font-bold text-5xl xl:text-6xl" style="color: #DD6722;">300</div>
                            <div class="w-1/2 xl:w-1/4 ml-10 text-white text-xl font-bold">Căn nhà đang được giao bán</div>
                        </div>
                        <div class="mt-16 xl:mt-20 xl:ml-10 flex">
                            <div class="w-1/2 xl:w-1/4 font-bold text-5xl xl:text-6xl" style="color: #DD6722;">1000</div>
                            <div class="w-1/2 xl:w-1/4 ml-10 text-white text-xl font-bold">Giao dịch thành công</div>
                        </div>
                    </div>
                    <div class="mt-10 xl:mt-0 w-11/12 m-auto xl:w-5/12 flex-col text-center">
                        <div style="color: #EF562D;">
                            Mua nhà, Thuê nhà, Tìm nhà
                        </div>
                        <div class="text-white text-2xl font-bold">CÔNG TY BẤT ĐỘNG SẢN</div>
                        <div class="text-white xl:text-left mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
