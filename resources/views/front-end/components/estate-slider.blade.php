<div class="estate-slider mt-6 xl:mt-10 w-full flex-col sm:flex sm:flex-row propDisplay justify-between items-center relative"
    id="estate-slider">
    <div class="splide__arrows hidden lg:block">
        <button
            class="splide__arrow splide__arrow--prev text-2xl text-black hover:text-orange-600 hover:bg-orange-600">
            <i class="fas fa-caret-left"></i>
        </button>
        <button
            class="splide__arrow splide__arrow--next text-2xl text-black hover:text-orange-600 hover:bg-orange-600">
            <i class="fas fa-caret-right"></i>
        </button>
    </div>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($news as $new)
            @php
                $stringToReplace = array('Bán ', 'Cho thuê ');;
                $stringFrom = $new->formType->name;
                $loai_hinhthuc =  ucfirst(str_replace($stringToReplace, '',$stringFrom));

                $loai_hinhthuc = str_replace('đ', 'Đ', $loai_hinhthuc);
                if($new->loai_hinhthuc_id == 9 || $new->loai_hinhthuc_id == 18) {
                    $loai_hinhthuc = "Hình thức khác";
                }
            @endphp
                <li class="mb-6 xl:mb-0 flex-col splide__slide">
                    <div class="housePreviewBox" style="height: 500px">
                        @if ($new->house != null)
                            <a href=" {{ route('houseDetail', ['id' => $new->id]) }}">
                                <div class="h-2/3">
                                    @if ($new->house->linkImg != null)
                                        <img class="w-full h-full object-contain" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->house->linkImg)[0] }}"
                                        alt="">
                                    @else
                                        <img class="w-full h-full object-contain" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                                        alt="">
                                    @endif
                                </div>
                                <div class=" grid grid-cols-1">
                                    <div class="pt-4 px-5 font-medium">{{ $new->title }}</div>
                                    <div class="py-1 px-5 text-sm font-light row-span-2" style="color: #888686;">@if($new->house->xaid != null) {{ $new->house->ward->name }}, @endif {{ $new->house->district->name }}, {{ $new->house->city->name }}
                                    </div>
                                    <div class="px-5">
                                        <div class="w-full flex justify-between py-1 font-medium"
                                            style="border-top: solid 1px #C4C4C4;">
                                            @if ($new->house->phong_ngu != null)
                                                <div>
                                                    <i class="fa-solid fa-bed"></i> {{ $new->house->phong_ngu }}
                                                </div>
                                            @endif
                                            @if ($new->house->toilet != null)
                                                <div>
                                                    <i class="fa-solid fa-bath"></i> {{ $new->house->toilet }}
                                                </div>
                                            @endif
                                            <div><i class="fa-solid fa-house-chimney"></i> {{ $new->house->dientich }} m²</div>
                                            <div class="font-light" style="color: #888686;">
                                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                                {{ $loai_hinhthuc }}
                                            </div>
                                        </div>
                                    </div>
                                    @if ($new->donvi_id == 1 || $new->donvi_id == 6)
                                        <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->don_vi->donvi }}</div>
                                    @else
                                    <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->gia }} {{ $new->don_vi->donvi }}</div>
                                    @endif
                                </div>
                            </a>
                        @else
                            <a href=" {{ route('houseDetail', ['id' => $new->id]) }}">
                                <div class="h-2/3">
                                    @if ($new->land->linkImg != null)
                                        <img class="w-full h-full object-contain" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->land->linkImg)[0] }}"
                                        alt="">
                                    @else
                                        <img class="w-full h-full object-contain" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                                        alt="">
                                    @endif
                                </div>
                                <div class=" grid grid-cols-1">
                                    <div class="pt-4 px-5 font-medium">{{ $new->title }}</div>
                                    <div class="py-1 px-5 text-sm font-light row-span-2" style="color: #888686;">@if($new->land->xaid != null) {{ $new->land->ward->name }}, @endif {{ $new->land->district->name }}, {{ $new->land->city->name }}
                                    </div>
                                    <div class="px-5">
                                        <div class="w-full flex justify-between py-1 font-medium"
                                            style="border-top: solid 1px #C4C4C4;">
                                            <div><i class="fa-solid fa-map"></i> 100 m²</div>
                                            <div class="font-light" style="color: #888686;">
                                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                                {{ $loai_hinhthuc }}
                                            </div>
                                        </div>
                                    </div>
                                    @if ($new->donvi_id == 1 || $new->donvi_id == 6)
                                        <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->don_vi->donvi }}</div>
                                    @else
                                    <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->gia }} {{ $new->don_vi->donvi }}</div>
                                    @endif
                                </div>
                            </a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById('estate-slider')) {
                new Splide('#estate-slider', {
                    perPage: 4,
                    type: 'loop',
                    autoplay: true,
                    pauseOnHover: false,
                }).mount();
            }
        });
    </script>
</div>
