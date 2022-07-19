{{-- search --}}
<div class="mt-20" style="background-image: url('{{ asset('images/front-end/home/bg.png')}}'); min-height: 500px">
    <div class="my-auto flex-col">
        <div class="text-white w-full pt-20 text-lg xl:text-2xl text-center">TÌM KIẾM NGÔI NHÀ CỦA RIÊNG BẠN</div>
        <div class="mt-10 w-11/12 lg:w-1/2 md:w-4/5 mx-auto rounded-md bg-black bg-opacity-50 text-white px-4 py-2">
            <div class="w-full flex text-sm py-2">
                <div class="flex text-xs sm:text-sm w-3/4 sm:w-2/3 justify-start">
                    <div class="hover:underline hover:font-medium hover:decoration-orange-600">
                        <a class="pr-2 sm:pr-5" href="/">Mua nhà</a>
                    </div>
                    <div class="hover:underline hover:font-medium hover:decoration-orange-600">
                        <a class="pr-2 sm:pr-5" href="/">Thuê nhà</a>
                    </div>
                    <div class="hover:underline hover:font-medium hover:decoration-orange-600">
                        <a href="/">Cần tìm nhà</a>
                    </div>
                </div>
                <div class="w-1/4 text-xs sm:text-sm sm:w-1/3 flex justify-end text-right italic">
                    <div class="sm:hidden"><a href="/">Tìm kiếm</a></div>
                    <div class="hidden sm:block"><a href="/">Tìm kiếm nâng cao</a></div>
                </div>
            </div>
            <div class="rounded-md bg-white w-full flex justify-between">
                <div class="w-11/12 sm:w-5/6 px-2 flex">
                    <div class="w-1/12 sm:py-1">
                        <svg id="search-icon" class="search-icon h-6 w-6 pr-2 py-1" viewBox="0 0 24 24">
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                            <path d="M0 0h24v24H0z" fill="none" />
                        </svg>
                    </div>
                    <div class="w-11/12">
                        <input class="w-full pl-2 sm:pl-1 py-1 sm:py-2 text-xs sm:text-sm outline-none text-black" type="text"
                            placeholder="Tìm kiếm địa điểm, khu vực...">
                        <input type="submit" hidden="true">
                    </div>
                </div>
                <div class="w-1/12 sm:w-1/6 rounded-r-md bg-orange-600"></div>
            </div>
            <div class="w-full sm:w-11/12 flex py-4 justify-between">
                <div class="w-1/3 sm:w-1/4 text-xs sm:text-sm mr-1 border rounded-md h-2/3 flex py-1 px-2 group relative">
                    <button class="w-5/6 text-left"> Khu vực </button>
                    <div class="w-1/6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="pt-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                        </svg>
                    </div>
                    <nav tabindex="0"
                        class="border bg-black bg-opacity-50 invisible rounded w-32 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                        <ul class="py-1 font-normal">
                            <li>
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-black">Tất cả</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Hà Nội</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Hồ Chí Minh</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Đà Nẵng</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Hải Phòng</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="w-1/3 sm:w-1/4 text-xs sm:text-sm border rounded-md h-2/3 flex py-1 px-2 group relative">
                    <button class="w-5/6 text-left"> Diện tích </button>
                    <div class="w-1/6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="pt-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                        </svg>
                    </div>
                    <nav tabindex="0"
                        class="border bg-black bg-opacity-50 invisible rounded w-36 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                        <ul class="py-1 font-normal">
                            <li>
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-black">Tất cả</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Dưới 50m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">50m2 - 70m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">70m2 - 100m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">100m2 - 150m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">150m2 - 200m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">200m2 - 300m2</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">300m2 - 500m2</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="w-1/3 sm:w-1/4 text-xs sm:text-sm ml-1 border rounded-md h-2/3 flex py-1 px-2 group relative">
                    <button class="w-5/6 text-left"> Giá tiền </button>
                    <div class="w-1/6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="pt-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                        </svg>
                    </div>
                    <nav tabindex="0"
                        class="border bg-black bg-opacity-50 invisible rounded w-32 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                        <ul class="py-1 font-normal">
                            <li>
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-black">Tất cả</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Edit</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="hidden sm:block w-1/4 text-xs ml-1 sm:text-sm border rounded-md h-2/3 flex py-1 px-2 group relative">
                    <div class="flex">
                        <button class="w-5/6 text-left"> Phòng ngủ </button>
                        <div class="w-1/6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="pt-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                            </svg>
                        </div>
                    </div>
                    <nav tabindex="0"
                        class="border bg-black bg-opacity-50 invisible rounded w-32 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                        <ul class="py-1 font-normal">
                            <li>
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-black">Tất cả</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-black">Edit</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>