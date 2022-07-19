@extends('front-end.app')
@section('content')
<div class="mt-20 bg-gray-100">
    @include('front-end.components.banner-news')
    <div class="grid justify-items-stretch">
        <div class="mt-10 text-center text-orange-600 font-bold text-xl">
            Tin đã đăng
        </div>
        <div class="justify-self-center  sm:w-11/12 md:w-5/6 border-l-8 border-orange-600 rounded mx-1 p-2 bg-white mt-4 mb-5 flex">
            <div class="w-1/2 sm:w-3/4 lg:w-1/6 ml-2 md:ml-6 border border-gray rounded-md flex">
                <div class="w-1/6 py-1">
                    <svg id="search-icon" class="search-icon h-5 w-5 pl-1 pt-1" viewBox="0 0 24 24">
                        <path
                            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
                </div>
                <div class="w-full">
                    <input class="pt-2 w-11/12 pb-2 outline-none text-black text-sm" type="text"
                        placeholder="Tìm theo tiêu đề">
                    <input type="submit" hidden="true">
                </div>
            </div>
            <div class="hidden ml-12 mr-4 lg:block text-sm pt-2">Từ ngày</div>
            <div class="hidden lg:block ">
                <input class="w-4/6 mt-1 text-black text-sm outline-none border py-1 pl-2 rounded" type="text">
            </div>
            <div class="hidden lg:block mr-4 text-sm pt-2">Đến</div>
            <div class="hidden lg:block ">
                <input class="w-4/6 mt-1 text-black text-sm outline-none border py-1 pl-2 rounded" type="text">
            </div>
            <div class="w-1/3 lg:w-1/6 lg:relative pl-2 lg:pl-8 text-sm pl-2 pt-2">
                <a href="" class="bg-orange-600 lg:absolute lg:right-0 rounded py-2 px-3 text-white">Tìm kiếm</a>
            </div>
        </div>
        <div class="justify-self-center  sm:w-11/12 md:w-5/6 rounded mx-1 mt-4 mb-5 flex">
            @if(session()->has('success'))
                <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md
                            text-xs lg:text-sm justify-self-center font-light lg:font-bol mb-5 w-full"
                            role="alert">
                    <div class="flex">
                    <div class="py-1"><i class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4"> </i></div>

                    <div>

                        <p class="text-lg">{{ session()->get('success') }}</p>
                    </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="text-xs lg:text-sm justify-self-center font-light lg:font-bold sm:w-5/6 md:w-11/12 xl:w-5/6 p-2 bg-white mb-5">
            <!-- Tabs -->
            <div class="inline-flex pt-2 px-1 w-full border-b">
                <ul id="tabs" class="inline-flex pt-2 px-1 w-11/12">
                    <li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t text-orange-600 border-b-2 border-orange-600">
                        <a id="default-tab" href="#first">Tất cả</a>
                    </li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t">
                        <a href="#second">Đang hiểm thị</a>
                    </li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t">
                        <a href="#third">Sẽ hiểm thị</a>
                    </li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t">
                        <a href="#fourth">Hết hạn</a>
                    </li>
                </ul>
                <div class="flex justify-center items-center">
                    <a href="{{ route('client.news.create') }}" class="text-green-500">Thêm mới +</a>
                </div>
            </div>


            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">
                    <div>
                        {{ $all_news->links() }}
                    </div>
                    <table class="w-full">
                        <tr class="font-medium text-center bg-gray-200">
                            <th class="w-1/8 py-1 lg:pl-7">STT</th>
                            <th class="w-1/8 py-1">Mã tin</th>
                            <th class="w-1/8 py-1">Tiêu đề</th>
                            <th class="w-1/8 py-1">Ngày cập nhật</th>
                            <th class="w-1/8 py-1"></th>
                        </tr>
                        @if (sizeof($all_news) > 0)
                            @foreach ($all_news as $new)
                                <tr class="font-medium text-center border-t">
                                    <td class="w-1/8 py-1 lg:pl-7">{{ $loop->index + 1 }}</td>
                                    <td class="w-1/8 py-1">{{ $new->idBanking }}</td>
                                    <td class="w-1/8 py-1 pl-1">{{ $new->title }}</td>
                                    <td class="w-1/8 py-1">{{ $new->updated_at }}</td>
                                    <td class="hidden sm:block w-1/8 py-1">
                                        <div>
                                            <button class="py-1 px-8 border rounded">Sửa</button>
                                        </div>
                                        <div>
                                            <button class="py-1 px-8 border rounded mt-2">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="sm:hidden">
                                    <td></td>
                                    <td>
                                        <div class="flex pb-1 pt-1">
                                            <div>
                                                <button class="py-1 px-2 border rounded">Sửa</button>
                                            </div>
                                            <div>
                                                <button class="py-1 ml-2 px-2 border rounded">Xóa</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="font-medium text-center border-t">
                                <td colspan="5" class="py-5 text-xl">Nothing</td>
                            </tr>
                        @endif

                    </table>
                </div>
                <div id="second" class="hidden p-4">
                    <div>
                        {{ $show_news->links() }}
                    </div>
                    <table class="w-full">
                        <tr class="font-medium text-center bg-gray-200">
                            <th class="w-1/8 py-1 lg:pl-7">STT</th>
                            <th class="w-1/8 py-1">Mã tin</th>
                            <th class="w-1/8 py-1">Tiêu đề</th>
                            <th class="w-1/8 py-1">Ngày cập nhật</th>
                            <th class="w-1/8 py-1"></th>
                        </tr>
                        @if (sizeof($show_news) > 0)
                            @foreach ($show_news as $new)
                                <tr class="font-medium text-center border-t">
                                    <td class="w-1/8 py-1 lg:pl-7">{{ $loop->index + 1 }}</td>
                                    <td class="w-1/8 py-1">{{ $new->idBanking }}</td>
                                    <td class="w-1/8 py-1 pl-1">{{ $new->title }}</td>
                                    <td class="w-1/8 py-1">{{ $new->updated_at }}</td>
                                    <td class="hidden sm:block w-1/8 py-1">
                                        <div>
                                            <button class="py-1 px-8 border rounded">Sửa</button>
                                        </div>
                                        <div>
                                            <button class="py-1 px-8 border rounded mt-2">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="sm:hidden">
                                    <td></td>
                                    <td>
                                        <div class="flex pb-1 pt-1">
                                            <div>
                                                <button class="py-1 px-2 border rounded">Sửa</button>
                                            </div>
                                            <div>
                                                <button class="py-1 ml-2 px-2 border rounded">Xóa</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="font-medium text-center border-t">
                                <td colspan="5" class="py-5 text-xl">Nothing</td>
                            </tr>
                        @endif

                    </table>
                </div>
                <div id="third" class="hidden p-4">
                    <div>
                        {{ $wait_news->links() }}
                    </div>
                    <table class="w-full">
                        <tr class="font-medium text-center bg-gray-200">
                            <th class="w-1/8 py-1 lg:pl-7">STT</th>
                            <th class="w-1/8 py-1">Mã tin</th>
                            <th class="w-1/8 py-1">Tiêu đề</th>
                            <th class="w-1/8 py-1">Ngày cập nhật</th>
                            <th class="w-1/8 py-1"></th>
                        </tr>
                        @if (sizeof($wait_news) > 0)
                            @foreach ($wait_news as $new)
                                <tr class="font-medium text-center border-t">
                                    <td class="w-1/8 py-1 lg:pl-7">{{ $loop->index + 1 }}</td>
                                    <td class="w-1/8 py-1">{{ $new->idBanking }}</td>
                                    <td class="w-1/8 py-1 pl-1">{{ $new->title }}</td>
                                    <td class="w-1/8 py-1">{{ $new->updated_at }}</td>
                                    <td class="hidden sm:block w-1/8 py-1">
                                        <div>
                                            <button class="py-1 px-8 border rounded">Sửa</button>
                                        </div>
                                        <div>
                                            <button class="py-1 px-8 border rounded mt-2">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="sm:hidden">
                                    <td></td>
                                    <td>
                                        <div class="flex pb-1 pt-1">
                                            <div>
                                                <button class="py-1 px-2 border rounded">Sửa</button>
                                            </div>
                                            <div>
                                                <button class="py-1 ml-2 px-2 border rounded">Xóa</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="font-medium text-center border-t">
                                <td colspan="5" class="py-5 text-xl">Nothing</td>
                            </tr>
                        @endif

                    </table>
                </div>
                <div id="fourth" class="hidden p-4">
                    <div>
                        {{ $end_news->links() }}
                    </div>
                    <table class="w-full">
                        <tr class="font-medium text-center bg-gray-200">
                            <th class="w-1/8 py-1 lg:pl-7">STT</th>
                            <th class="w-1/8 py-1">Mã tin</th>
                            <th class="w-1/8 py-1">Tiêu đề</th>
                            <th class="w-1/8 py-1">Ngày cập nhật</th>
                            <th class="w-1/8 py-1"></th>
                        </tr>
                        @if (sizeof($end_news) > 0)
                            @foreach ($end_news as $new)
                                <tr class="font-medium text-center border-t">
                                    <td class="w-1/8 py-1 lg:pl-7">{{ $loop->index + 1 }}</td>
                                    <td class="w-1/8 py-1">{{ $new->idBanking }}</td>
                                    <td class="w-1/8 py-1 pl-1">{{ $new->title }}</td>
                                    <td class="w-1/8 py-1">{{ $new->updated_at }}</td>
                                    <td class="hidden sm:block w-1/8 py-1">
                                        <div>
                                            <button class="py-1 px-8 border rounded">Sửa</button>
                                        </div>
                                        <div>
                                            <button class="py-1 px-8 border rounded mt-2">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="sm:hidden">
                                    <td></td>
                                    <td>
                                        <div class="flex pb-1 pt-1">
                                            <div>
                                                <button class="py-1 px-2 border rounded">Sửa</button>
                                            </div>
                                            <div>
                                                <button class="py-1 ml-2 px-2 border rounded">Xóa</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="font-medium text-center border-t">
                                <td colspan="5" class="py-5 text-xl">Nothing</td>
                            </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {

            tabTogglers[i].parentElement.classList.remove("text-orange-600", "border-b-2", "border-orange-600", "bg-white");  tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");

            }
            e.target.parentElement.classList.add("text-orange-600", "border-b-2", "border-orange-600", "bg-white");
        });
        });
    </script>
</div>
@endsection
