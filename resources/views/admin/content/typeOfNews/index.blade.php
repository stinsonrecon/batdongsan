@extends('admin.app')

@section('title')
<title>Loại tin tức</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Loại tin tức</h1>
        </div>
        <!-- Content -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div class=" h-screen">
            <div class="mt-2">
                <div class="overflow-x-auto flex flex-col">
                    @can('create news_type')
                        <div class="flex flex-row-reverse">
                            <div class="m-6">
                                <a href="{{ route('admin.typeOfNews.create') }}"
                                class="font-bold py-2 px-4 border-2 rounded-lg hover:bg-white text-black focus:outline-none focus:shadow-outline"
                                type="button">
                                    Thêm loại tin tức
                                </a>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class=" flex items-top justify-center items-center mt-2">
                    <table class="w-full whitespace-nowrap">
                        <thead class="bg-gray-200 dark:bg-primary-darker">
                            <tr class=" text-left font-bold">
                                <td class="border px-6 py-4 text-center">Tên loại tin tức</td>
                                <td class="border px-6 py-4 text-center">Giá</td>
                                @if(auth()->user()->can('edit news_type') || auth()->user()->can('delete news_type'))
                                    <td class="border px-6 py-4 text-center">Hành động</td>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($newsTypes as $newsType)
                        <tbody>
                            <tr>
                                <td class="border px-6 py-4 text-center">{{$newsType->name}}</td>
                                <td class="border px-6 py-4 text-center">{{number_format($newsType->gia)}}</td>
                                @if(auth()->user()->can('edit news_type') || auth()->user()->can('delete news_type'))
                                    <td class="border px-6 py-4">
                                        <div class="flex item-left justify-center">
                                            @can('edit news_type')
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="{{ route('admin.typeOfNews.edit', ['newsType' => $newsType->id]) }}" class="">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('delete news_type')
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a class="" onclick="return myFunction();" href="#" >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
@section('js')

<script src="{{ asset('js/backend/bank/index.js') }}"></script>
@endsection
