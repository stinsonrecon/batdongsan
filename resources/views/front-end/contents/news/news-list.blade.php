@extends('front-end.app')
@section('content')
    <div class="mt-20">
        <div class="flex-col">
            {{-- News list banner and search --}}
            <div class="w-full text-white" style="background-image: url('{{ asset('images/front-end/banner/newsList.png') }}');
                                min-height:300px; background-repeat: no-repeat; background-size:cover;">
                <div class="w-1/3 m-auto flex-col text-center pt-16">
                    <div class="text-2xl font-bold">
                        Tìm kiếm tin tức
                    </div>
                    <div class="rounded-md bg-white w-full flex mt-6">
                        <div class="w-5/6 px-2 flex">
                            <div class="w-full">
                                <input class="w-full py-3 px-4 outline-none text-black" type="text"
                                    placeholder="Tìm kiếm địa điểm, khu vực...">
                                <input type="submit" hidden="true">
                            </div>
                        </div>
                        <div class="w-1/6 h-12 rounded-r-md bg-orange-600">
                            <div class="w-full h-full flex items-center">
                                <svg style="display:block; margin:auto;" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_682_420)">
                                        <path
                                            d="M19.7266 17.293L15.832 13.3984C15.6562 13.2227 15.418 13.125 15.168 13.125H14.5312C15.6094 11.7461 16.25 10.0117 16.25 8.125C16.25 3.63672 12.6133 0 8.125 0C3.63672 0 0 3.63672 0 8.125C0 12.6133 3.63672 16.25 8.125 16.25C10.0117 16.25 11.7461 15.6094 13.125 14.5312V15.168C13.125 15.418 13.2227 15.6562 13.3984 15.832L17.293 19.7266C17.6602 20.0938 18.2539 20.0938 18.6172 19.7266L19.7227 18.6211C20.0898 18.2539 20.0898 17.6602 19.7266 17.293ZM8.125 13.125C5.36328 13.125 3.125 10.8906 3.125 8.125C3.125 5.36328 5.35938 3.125 8.125 3.125C10.8867 3.125 13.125 5.35938 13.125 8.125C13.125 10.8867 10.8906 13.125 8.125 13.125Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_682_420">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-auto flex-col text-center" style="color: #383838;">
                <div class="text-3xl font-bold mt-10">
                    Tin tức về bất động sản
                </div>
                <div class="w-1/2 mt-4 text-lg m-auto">
                    Những thông tin mới nhất về bất động sản, tài chính, định giá thị trường, dự án tiêm năng và nhiều thông
                    tin khác liên quan
                </div>
                <div class="flex-col w-3/4 m-auto">
                    <div class="flex mt-10">
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
        </div>
    @endsection
