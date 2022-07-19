@extends('admin.app')

@section('title')
<title>News</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">News</h1>
        </div>
        <!-- Content -->
        <div class=" h-screen">
            <div class="mt-2">
                <div class="overflow-x-auto flex flex-col">
                    <div class=" w-11/12  mx-auto mx-8 bg-green-700  table-auto">
                        @if(session()->has('success'))
                            <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                <div class="py-1"><i class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4"> </i></div>

                                <div>

                                    <p class="text-lg">{{ session()->get('success') }}</p>
                                </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class=" w-11/12  mx-auto mx-8  table-auto pb-5">
                            {{ $news->links() }}
                        </div>
                        <table class=" w-11/12  mx-auto mx-8  table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Mã tin</th>
                                    <th class="py-3 px-6 text-left">Tiêu đề</th>
                                    <th class="py-3 px-6 text-left">Loại bất động sản</th>
                                    <th class="py-3 px-6 text-left">Loại tin</th>
                                    <th class="py-3 px-6 text-left">Tài khoản đăng</th>
                                    <th class="py-3 px-6 text-center">Hành động</th>

                                </tr>
                            </thead>
                            <tbody class="text-sm font-light">
                                @foreach($news as $new)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 hover:text-black">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <a href="{{route('admin.news.detail', ['id' => $new->id])}}" class="font-medium hover:text-gray-400 border-b-2 border-gray-800">
                                                <span class="font-medium whitespace-nowrap">{{ $new->idBanking }}</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <span class="font-medium whitespace-nowrap">{{$new->title}}</span>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium whitespace-nowrap">{{ $new->formType->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $new->newsType->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center whitespace-nowrap">
                                            <a href="{{route('admin.customer.detail', ['id' => $new->customer->id])}}" class="align-middle hover:text-gray-400 border-b-2 border-gray-800">
                                                <span class="font-medium whitespace-nowrap">{{ $new->customer->username }}</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex item-center justify-center">

                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href="{{ route('admin.news.detail', ['id' => $new->id]) }}" class="">
                                                    <i class="fa-solid fa-stamp"></i>
                                                </a>
                                            </div>

                                            @can('edit estate news')
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="{{ route('admin.news.edit', ['id' => $new->id, 'id_cus' => $new->customer->id]) }}" class="">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            @endcan

                                            @can('delete estate news')
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a class="" href="{{ route('admin.news.delete', ['id' => $new->id]) }}" >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
