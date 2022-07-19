@extends('admin.app')

@section('title')
<title>Apartment/house</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex-col items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold py-1">
                Thuộc mã tin
                <a href="{{ route('admin.news.detail', ['id' => $house->news->id]) }}"
                    class="underline dark:text-primary-dark hover:text-white">
                    {{ $house->news->idBanking }}
                </a>
            </h1>
        </div>
        <!-- Content -->
        <div>
            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <div class="flex flex-col pl-4 text-center">
                    <div class=" text-gray-500 dark:text-primary-dark text-lg font-medium">
                        Diện tích
                    </div>
                    <div class="dark:text-primary-darker text-xl font-bold">
                        {{ $house->dientich }} m²
                    </div>
                </div>

                @if($house->phong_ngu != null)
                <div class="flex flex-col px-20 text-center">
                    <div class=" text-gray-500 dark:text-primary-dark text-lg font-medium">
                        Phòng ngủ
                    </div>
                    <div class="dark:text-primary-darker text-xl font-bold">
                        {{ $house->phong_ngu }} PN
                    </div>
                </div>
                @endif
            </div>

            <div class="border-b dark:border-primary-darker py-5 px-4">
                <div class="dark:text-primary-darker text-xl font-bold">
                    Thông tin mô tả
                </div>
                <div class="dark:text-primary-darker text-lg font-medium pt-5 pb-8">
                    {!! $house->mo_ta !!}
                </div>

                <div class="dark:text-primary-darker text-xl font-bold pb-5">
                    Đặc điểm bất động sản
                </div>

                <ul>
                    <li class="flex border dark:border-primary-darker py-3 px-2">
                        <div class="pr-20">
                            Địa chỉ:
                        </div>
                        <div class="pl-1">
                            {{ $house->ten_duong }}, @if($house->xaid != null) {{ $house->ward->name }}, @endif {{ $house->district->name }}, {{ $house->city->name }}
                        </div>

                    </li>
                    @if ($house->mat_tien != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-16">
                                Mặt tiền:
                            </div>
                            <div class="pl-3">
                                {{ $house->mat_tien }} m
                            </div>
                        </li>
                    @endif
                    @if ($house->duong_vao != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-14">
                                Đường vào:
                            </div>
                            <div>
                                {{ $house->duong_vao }} m
                            </div>
                        </li>
                    @endif
                    @if($house->huong_nha != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-10">
                                Hướng nhà:
                            </div>
                            <div class="pl-4">
                                @switch($house->huong_nha)
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
                    @if($house->huong_ban_cong != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-4">
                                Hướng ban công:
                            </div>
                            <div>
                                @switch($house->huong_ban_cong)
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
                    @if ($house->so_tang != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-20">
                                Số tầng:
                            </div>
                            <div>
                                {{ $house->so_tang }} tầng
                            </div>
                        </li>
                    @endif
                    @if ($house->phong_ngu != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-9">
                                Số phòng ngủ:
                            </div>
                            <div>
                                {{ $house->phong_ngu }} phòng
                            </div>
                        </li>
                    @endif
                    @if ($house->toilet != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class=" pr-14">
                                Số toilet:
                            </div>
                            <div class="pl-5">
                                {{ $house->toilet }} phòng
                            </div>
                        </li>
                    @endif
                    @if ($house->phap_ly != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-20">
                                Pháp lý:
                            </div>
                            <div class="pl-1">
                                {{ $house->phap_ly }}
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <div class="flex flex-col">
                    <div class="dark:text-primary-darker text-xl font-bold pl-4 pb-5">
                        Hình ảnh
                    </div>
                    @if ($house->linkImg != null)
                        <div class="dark:text-primary-darker text-xl font-bold">
                            @if (sizeof($house->linkImg) > 1)
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
                                            @foreach ($house->linkImg as $img)
                                                <li class="text-center splide__slide px-3">
                                                    <img class="" src="{{ asset('storage/estate_images') . '/' . $house->news->idBanking . '/' . $img }}" alt="">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="flex justify-center items-center">
                                    <img class="" src="{{ asset('storage/estate_images') . '/' . $house->news->idBanking . '/' . ($house->linkImg)[0] }}" alt="">
                                </div>
                            @endif
                        </div>
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
        </div>
    </main>
    {{-- <button class="fixed bottom-10 right-10 rounded-full
                border-primary-dark bg-white text-black
                w-12 h-12 flex justify-center items-center
                hover:bg-primary-dark hover:text-white hover:animate-bounce">
        <a href="{{ route('admin.house.edit', ['id' => $house->id]) }}"><i class="fas fa-edit"></i></a>
    </button> --}}
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
