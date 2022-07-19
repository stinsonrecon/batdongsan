@extends('admin.app')

@section('title')
<title>News</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image"/>
            <div>
                <div class="flex">
                    <div class="text-2xl font-semibold mr-2">
                        {{ $new->customer->full_name }}
                    </div>
                    @if ($new->customer->verify == 1)
                        <span class="font-medium py-1 px-3 bg-green-200 rounded-full text-green-600"> Verify </span>
                    @else
                        <span class="font-medium py-1 px-3 bg-red-200 rounded-full text-red-600"> Unverify </span>
                    @endif
                </div>

                <div class="text-lg">
                    {{ $new->customer->username }}
                </div>
            </div>
        </div>
        <div class="flex-col items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <div class="flex">
                <div class="text-2xl font-semibold mr-2">
                    Mã tin: {{ $new->idBanking }}
                </div>
                @if ($new->status == 2)
                    <span class="font-medium py-1 px-3 bg-green-200 rounded-full text-green-600"> Đã kiểm duyệt </span>
                @elseif ($new->status == 3)
                    <span class="font-medium py-1 px-3 bg-yellow-200 rounded-full text-yellow-600"> Hết hạn </span>
                @else
                    <span class="font-medium py-1 px-3 bg-red-200 rounded-full text-red-600"> Chưa thanh toán/kiểm duyệt </span>
                @endif
            </div>
        </div>
        <div class="border-b dark:border-primary-darker py-5 px-4">
            <div class="dark:text-primary-darker text-xl font-bold pb-5">
                Thông tin bài đăng
            </div>

            <ul>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Tiêu đề:
                    </div>
                    <div class="pl-1">
                        {{ $new->title }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Hình thức:
                    </div>
                    <div class="pl-1">
                        {{ $new->formType->name }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Giá:
                    </div>
                    <div class="pl-1">
                        {{ $new->gia }} {{ $new->don_vi->donvi }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Loại tin:
                    </div>
                    <div class="pl-1">
                        {{ $new->newsType->name }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Ngày bắt đầu:
                    </div>
                    <div class="pl-1">
                        {{ $new->startTime }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Ngày kết thúc:
                    </div>
                    <div class="pl-1">
                        {{ $new->endTime }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Tên người liên lạc:
                    </div>
                    <div class="pl-1">
                        {{ $new->contact_name }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Số điện thoại liên lạc:
                    </div>
                    <div class="pl-1">
                        {{ $new->contact_phone }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Email liên lạc:
                    </div>
                    <div class="pl-1">
                        {{ $new->email }}
                    </div>
                </li>
                <li class="flex border dark:border-primary-darker py-3 px-2">
                    <div class="pr-20">
                        Địa chỉ liên lạc:
                    </div>
                    <div class="pl-1">
                        {{ $new->address }}
                    </div>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div>
            <div class="border-b dark:border-primary-darker py-5 px-4">
                <div class="dark:text-primary-darker text-xl font-bold">
                    Thông tin mô tả bất động sản
                </div>
                @if ($new->house != null)
                    <div class="dark:text-primary-darker text-lg font-medium pt-5">
                        {!! $new->house->mo_ta !!}
                    </div>
                @else
                    <div class="dark:text-primary-darker text-lg font-medium pt-5">
                        {!! $new->land->mo_ta !!}
                    </div>
                @endif

                <div class="flex justify-start py-5 dark:border-primary-darker">
                    <div class="flex flex-col text-center">
                        <div class=" text-gray-500 dark:text-primary-dark text-lg font-medium">
                            Diện tích
                        </div>
                        @if ($new->house != null)
                            <div class="dark:text-primary-darker text-xl font-bold">
                                {{ $new->house->dientich }} m²
                            </div>
                        @else
                            <div class="dark:text-primary-darker text-xl font-bold">
                                {{ $new->land->dientich }} m²
                            </div>
                        @endif

                    </div>
                    @if ($new->house != null)
                        @if($new->house->phong_ngu != null)
                        <div class="flex flex-col px-20 text-center">
                            <div class=" text-gray-500 dark:text-primary-dark text-lg font-medium">
                                Phòng ngủ
                            </div>
                            <div class="dark:text-primary-darker text-xl font-bold">
                                {{ $new->house->phong_ngu }} PN
                            </div>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="dark:text-primary-darker text-xl font-bold pb-5 pt-2">
                    Đặc điểm bất động sản
                </div>

                <ul>
                    <li class="flex border dark:border-primary-darker py-3 px-2">
                        <div class="pr-20">
                            Địa chỉ:
                        </div>
                        @if ($new->house != null)
                            <div class="pl-1">
                                {{ $new->house->ten_duong }}, @if($new->house->xaid != null) {{ $new->house->ward->name }}, @endif {{ $new->house->district->name }}, {{ $new->house->city->name }}
                            </div>
                        @else
                            <div class="pl-1">
                                {{ $new->land->ten_duong }}, @if($new->land->xaid != null) {{ $new->land->ward->name }}, @endif {{ $new->land->district->name }}, {{ $new->land->city->name }}
                            </div>
                        @endif
                    </li>
                    @if ($new->house != null)
                        @if ($new->house->mat_tien != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-16">
                                    Mặt tiền:
                                </div>
                                <div class="pl-3">
                                    {{ $new->house->mat_tien }} m
                                </div>
                            </li>
                        @endif
                        @if ($new->house->duong_vao != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-14">
                                    Đường vào:
                                </div>
                                <div>
                                    {{ $new->house->duong_vao }} m
                                </div>
                            </li>
                        @endif
                        @if($new->house->huong_nha != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-10">
                                    Hướng nhà:
                                </div>
                                <div class="pl-4">
                                    @switch($new->house->huong_nha)
                                        @case(1)
                                            Đông
                                            @break
                                        @case(2)
                                            Tây
                                            @break
                                        @case(3)
                                            Nam
                                            @break
                                        @case(4)
                                            Bắc
                                            @break
                                        @case(5)
                                            Đông Bắc
                                            @break
                                        @case(6)
                                            Tây Bắc
                                            @break
                                        @case(7)
                                            Đông Nam
                                            @break
                                        @case(8)
                                            Tây Nam
                                            @break
                                        @default
                                            &nbsp
                                            @break
                                    @endswitch
                                </div>
                            </li>
                        @endif
                        @if($new->house->huong_ban_cong != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-4">
                                    Hướng ban công:
                                </div>
                                <div>
                                    @switch($new->house->huong_ban_cong)
                                        @case(1)
                                            Đông
                                            @break
                                        @case(2)
                                            Tây
                                            @break
                                        @case(3)
                                            Nam
                                            @break
                                        @case(4)
                                            Bắc
                                            @break
                                        @case(5)
                                            Đông Bắc
                                            @break
                                        @case(6)
                                            Tây Bắc
                                            @break
                                        @case(7)
                                            Đông Nam
                                            @break
                                        @case(8)
                                            Tây Nam
                                            @break
                                        @default
                                            &nbsp
                                            @break
                                    @endswitch
                                </div>
                            </li>
                        @endif
                        @if ($new->house->so_tang != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-20">
                                    Số tầng:
                                </div>
                                <div>
                                    {{ $new->house->so_tang }} tầng
                                </div>
                            </li>
                        @endif
                        @if ($new->house->phong_ngu != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-9">
                                    Số phòng ngủ:
                                </div>
                                <div>
                                    {{ $new->house->phong_ngu }} phòng
                                </div>
                            </li>
                        @endif
                        @if ($new->house->toilet != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class=" pr-14">
                                    Số toilet:
                                </div>
                                <div class="pl-5">
                                    {{ $new->house->toilet }} phòng
                                </div>
                            </li>
                        @endif
                        @if ($new->house->phap_ly != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-20">
                                    Pháp lý:
                                </div>
                                <div class="pl-1">
                                    {{ $new->house->phap_ly }}
                                </div>
                            </li>
                        @endif
                    @else
                        @if ($new->land->mat_tien != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-16">
                                    Mặt tiền:
                                </div>
                                <div class="pl-3">
                                    {{ $new->land->mat_tien }} m
                                </div>
                            </li>
                        @endif
                        @if ($new->land->duong_vao != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-14">
                                    Đường vào:
                                </div>
                                <div>
                                    {{ $new->land->duong_vao }} m
                                </div>
                            </li>
                        @endif
                        @if($new->land->huong_nha != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-10">
                                    Hướng nhà:
                                </div>
                                <div class="pl-4">
                                    @switch($new->land->huong_nha)
                                        @case(1)
                                            Đông
                                            @break
                                        @case(2)
                                            Tây
                                            @break
                                        @case(3)
                                            Nam
                                            @break
                                        @case(4)
                                            Bắc
                                            @break
                                        @case(5)
                                            Đông Bắc
                                            @break
                                        @case(6)
                                            Tây Bắc
                                            @break
                                        @case(7)
                                            Đông Nam
                                            @break
                                        @case(8)
                                            Tây Nam
                                            @break
                                        @default
                                            &nbsp
                                            @break
                                    @endswitch
                                </div>
                            </li>
                        @endif
                        @if ($new->land->phap_ly != null)
                            <li class="flex border dark:border-primary-darker py-3 px-2">
                                <div class="pr-20">
                                    Pháp lý:
                                </div>
                                <div class="pl-1">
                                    {{ $new->land->phap_ly }}
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>

            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <div class="flex flex-col">
                    <div class="dark:text-primary-darker text-xl font-bold pl-4 pb-5">
                        Hình ảnh
                    </div>
                    @if ($new->house != null)
                        @if ($new->house->linkImg != null)
                            <div class="dark:text-primary-darker text-xl font-bold">
                                @if (sizeof($new->house->linkImg) > 1)
                                    <div class="product-slider relative flex flex-wrap justify-around w-full"
                                        id="productList">
                                        <div class="splide__arrows hidden lg:block">
                                            <button
                                                class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                <i class="fas fa-caret-left"></i>
                                            </button>
                                            <button
                                                class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                <i class="fas fa-caret-right"></i>
                                            </button>
                                        </div>
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach ($new->house->linkImg as $img)
                                                    <li class="text-center splide__slide px-3">
                                                        <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex justify-center items-center">
                                        <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->house->linkImg)[0] }}" alt="">
                                    </div>
                                @endif
                            </div>
                        @endif
                    @else
                        @if($new->land->linkImg != null)
                            <div class="dark:text-primary-darker text-xl font-bold">
                                @if (sizeof($new->land->linkImg) > 1)
                                    <div class="product-slider relative flex flex-wrap justify-around w-full"
                                        id="productList">
                                        <div class="splide__arrows hidden lg:block">
                                            <button
                                                class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                <i class="fas fa-caret-left"></i>
                                            </button>
                                            <button
                                                class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                                                <i class="fas fa-caret-right"></i>
                                            </button>
                                        </div>
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach ($new->land->linkImg as $img)
                                                    <li class="text-center splide__slide px-3">
                                                        <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <img class="" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->land->linkImg)[0] }}" alt="">
                                @endif
                            </div>
                        @endif
                    @endif
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            if (document.getElementsByClassName('product-slider')[0]) {
                                new Splide('.product-slider', {
                                    perPage: 3,
                                    type: 'loop',
                                    autoplay: true,
                                    pauseOnHover: false,
                                }).mount();
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <form class="flex-col" method="POST" action="{{ route('admin.news.verify', ['id' => $new->id]) }}">
                    @csrf
                    <div class="pb-5">
                        <div class="dark:text-primary-darker text-xl font-bold pl-4 pb-5">
                            Xác thực tin đăng
                        </div>
                        <div class="flex justify-between pl-4">
                            <div class="pr-10">
                                <label>Chưa thanh toán/kiểm duyệt</label>
                                <input type="radio" id="status" name="status" value="1"
                                @if ($new->status == 1)
                                    checked
                                @endif>
                            </div>
                            <div class="pr-10">
                                <label>Đã kiểm duyệt</label>
                                <input type="radio" name="status" id="status" value="2"
                                @if ($new->status == 2)
                                    checked
                                @endif>
                            </div>
                            <div>
                                <label>Hết hạn</label>
                                <input type="radio" name="status" id="status" value="3"
                                @if ($new->status == 3)
                                    checked
                                @endif>
                            </div>
                        </div>
                    </div>

                    <button class="ml-4 border-2 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline dark:hover:bg-primary-darker hover:bg-gray-300" type="submit">
                        Cập nhật
                    </button>
                </form>
            </div>
        </div>
    </main>
    {{-- <button class="fixed bottom-10 right-10 rounded-full
                border-primary-dark bg-white text-black
                w-12 h-12 flex justify-center items-center
                hover:bg-primary-dark hover:text-white hover:animate-bounce">
        <a href=""><i class="fas fa-edit"></i></a>
    </button> --}}
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
