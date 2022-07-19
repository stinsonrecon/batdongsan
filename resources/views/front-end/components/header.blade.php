{{-- header --}}
<div class="h-20 w-full flex bg-white text-black border-b-2 border-red-600 z-20 top-0 fixed">
    <div class="my-auto text-center w-11/12 lg:w-3/12 text-3xl text-orange-600 font-black"><a href="/">Logo</a></div>
    <div class="hidden lg:block my-auto w-7/12 2xl:w-6/12">
        <ul class="flex font-medium justify-center">
            <li class="w-1/6 group relative text-center">
                <button class="font-medium hover:text-orange-600"> Mua nhà</button>
                <nav tabindex="0"
                    class="border bg-white invisible rounded w-48 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                    <ul class="py-1 font-normal">
                        <li>
                            <a href="{{ route('home-list', ['id' => 1]) }}" class="block px-4 py-2 hover:bg-gray-100">Căn hộ chung cư</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 2]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà riêng</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 3]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà biệt thự, liền kề</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 4]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà mặt phố</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 5]) }}" class="block px-4 py-2 hover:bg-gray-100">Đất nền dự án</a>
                        </li>
                        <li>
                            <a href="{{ route('land-list', ['id' => 6]) }}" class="block px-4 py-2 hover:bg-gray-100">Đất</a>
                        </li>
                        <li>
                            <a href="{{ route('land-list', ['id' => 7]) }}" class="block px-4 py-2 hover:bg-gray-100">Trang trại, khu nghỉ dưỡng</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 8]) }}" class="block px-4 py-2 hover:bg-gray-100">Kho, nhà xưởng</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 9]) }}" class="block px-4 py-2 hover:bg-gray-100">Condotel</a>
                        </li>
                        <li>
                            <a href="{{ route('land-list', ['id' => 10]) }}" class="block px-4 py-2 hover:bg-gray-100">Khác</a>
                        </li>
                    </ul>
                </nav>
            </li>
            <li class="w-1/6 group text-center relative">
                <button class="font-medium hover:text-orange-600"> Thuê nhà</button>
                <nav tabindex="0"
                    class="border bg-white invisible rounded w-48 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                    <ul class="py-1 font-normal">
                        <li>
                            <a href="{{ route('home-list', ['id' => 11]) }}" class="block px-4 py-2 hover:bg-gray-100">Căn hộ, chung cư</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 12]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà riêng</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 13]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà mặt phố</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 14]) }}" class="block px-4 py-2 hover:bg-gray-100">Nhà, phòng trọ</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 15]) }}" class="block px-4 py-2 hover:bg-gray-100">Văn phòng</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 16]) }}" class="block px-4 py-2 hover:bg-gray-100">Cửa hàng, kí ốt</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 17]) }}" class="block px-4 py-2 hover:bg-gray-100">Kho, nhà xưởng, đất</a>
                        </li>
                        <li>
                            <a href="{{ route('home-list', ['id' => 18]) }}" class="block px-4 py-2 hover:bg-gray-100">Khác</a>
                        </li>
                    </ul>
                </nav>
            </li>
            <li class="w-1/6 group text-center relative">
                <button class="font-medium hover:text-orange-600">Dự án</button>
                <nav tabindex="0"
                    class="border bg-white invisible rounded w-52 absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                    <ul class="py-1 font-normal">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Căn hộ, Chung cư</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Cao ốc văn phòng</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Trung tâm thương mại</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Khu đô thị mới</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Nhà ở xã hội</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Khu nghỉ dưỡng</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dự án khác</a>
                        </li>
                    </ul>
                </nav>
            </li>
            <li class="w-1/6 text-center hover:text-orange-600"><a href="{{route('newsList')}}">Tin tức</a></li>
            <li class="w-1/6 text-center hover:text-orange-600"><a href="/">Phong thủy</a></li>
        </ul>
    </div>
    @auth
        <div class="hidden lg:block my-auto w-3/12 pr-16 font-medium dropdown relative">
            <div class="flex justify-end ">
                <div class="flex items-center">
                    <img class="inline object-cover w-10 h-10 ring-2 mr-2 rounded-full" src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image"/>
                    <a href="{{ route('account.index') }}">
                        {{ Auth::user()->full_name }}
                    </a>
                    <!-- verify -->
                    <div class="ml-1">
                        @if(Auth::user()-> verify == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" id="verify" class="h-6 w-6" fill="red" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> 
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" id="verify" class="h-6 w-6" fill="green" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> 
                        @endif
                    </div>
                </div>
                {{-- <a href="{{ route('client.login.index') }}"><div class=" mt-1 text-right pr-4 hover:text-orange-600">Đăng nhập</div></a> --}}
            </div>
            <ul class="dropdown-menu absolute pt-5 right-0 bg-white hidden">
                <li class="">
                    <a class="rounded-t  pt-1 pb-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('client.news.create') }}">
                        Đăng mới
                    </a>
                </li>
                <li class="">
                    <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.postedNews.index') }}">
                        Tin đã đăng
                    </a>
                </li>
                <li class="">
                    <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.info.edit') }}">
                        Thay đổi thông tin
                    </a>
                </li>
                <li class="">
                    <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.password.edit') }}">
                        Đổi mật khẩu
                    </a>
                </li>
                <li class="">
                    <form action="{{ route('client.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="rounded-b py-2 px-4 block whitespace-no-wrap hover:text-orange-600 font-semibold">
                            Đăng xuất
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <div class="hidden lg:block my-auto w-3/12 pr-16 font-medium">
            <ul class="flex justify-end">
                <a href="{{ route('client.login.index') }}"><li class=" mt-1 text-right pr-4 hover:text-orange-600">Đăng nhập</li></a>
                <a href="{{ route('client.register.index') }}"><li class="py-1 px-2 text-white bg-orange-600 rounded-md text-center hover:bg-orange-500">
                    Đăng ký
                </li></a>
            </ul>
        </div>
    @endauth

    <div class="lg:hidden my-auto w-1/12 group relative">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <nav tabindex="10" class="border bg-white invisible w-72 absolute right-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
            <div id="group1" class="pl-3 group relative">
                <button onclick="set_hidden1()" class="flex items-center block p-1 w-full bg-white">
                    <div class="pl-4 font-medium text-left w-11/12">Mua nhà</div>
                    <div class="w-1/12">
                        <svg id="icon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <nav tabindex="0" class="bg-white invisible w-full absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0">
                    <ul id="menu_hidden1" class="hidden font-normal">
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà đất</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Chung cư</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Biệt thự</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà phố</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Mua đất</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Khác</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="group2" class="pl-3 group relative">
                <button onclick="set_hidden2()" class="flex items-center block p-1 w-full bg-white">
                    <div class="pl-4 font-medium text-left w-11/12">Thuê nhà</div>
                    <div class="w-1/12">
                        <svg id="icon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <nav tabindex="0" class="bg-white invisible w-full absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0">
                    <ul id="menu_hidden2" class="hidden font-normal">
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà đất</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Biệt thự</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Chung cư</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà trọ</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà phố</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Văn phòng</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Khác</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="group3" class="pl-3 group relative">
                <button onclick="set_hidden3()" class="flex items-center block p-1 w-full bg-white">
                    <div class="pl-4 font-medium text-left w-11/12">Dự án</div>
                    <div class="w-1/12">
                        <svg id="icon3" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <nav tabindex="0" class="bg-white invisible w-full absolute left-0 top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0">
                    <ul id="menu_hidden3" class="hidden font-normal">
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Căn hộ, Chung cư</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Cao ốc văn phòng</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Trung tâm thương mại</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Khu đô thị mới</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Nhà ở xã hội</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Khu nghỉ dưỡng</a>
                        </li>
                        <li>
                            <a href="#" class="block pl-12 hover:bg-gray-100">Dự án khác</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="group4" class="pl-3">
                <button onclick="set_hidden4()" class="flex items-center block p-1 w-full bg-white">
                    <div class="pl-4 font-medium text-left w-11/12">Tin tức</div>
                </button>
            </div>
            <div id="group5" class="pl-3">
                <button onclick="set_hidden5()" class="flex items-center block p-1 w-full bg-white">
                    <div class="pl-4 font-medium text-left w-11/12">Phong thủy</div>
                </button>
            </div>
            @auth
            <div>
                hello
            </div>
                @else
                <div class="my-auto font-medium">
                    <ul class="flex items-center pl-10 py-2">
                        <a href="{{ route('client.login.index') }}"><li class="border text-center py-1 px-2 rounded-md mt-1 text-righthover:text-orange-600 hover:bg-gray-100">Đăng nhập</li></a>
                        <a href="{{ route('client.register.index') }}"><li class="border py-1 px-2 text-white bg-orange-600 ml-5 rounded-md text-center hover:bg-orange-500">
                            Đăng ký
                        </li></a>
                    </ul>
                </div>
            @endauth
        </nav>
    </div>
</div>


