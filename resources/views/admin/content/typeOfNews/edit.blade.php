@extends('admin.app')

@section('title')
<title>Sửa loại tin tức</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Loại tin tức | Sửa</h1>
        </div>
        <!-- Content -->
        <div class=" h-screen">
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('admin.typeOfNews.store', ['newsType' => $newsType->id]) }}" >
                @csrf
                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Tên loại tin tức
                        <span class=" text-base">*</span>
                    </label>
                    <input value="{{$newsType->name}}" class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Nhập tên loại tin tức">
                </div>
                <div class="mb-4">
                    @error('name')
                        <div class=" border border-red-400 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{$message}}</strong>

                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Giá tin
                        <span class=" text-base">*</span>
                    </label>
                    <input value="{{$newsType->gia}}" class="@error('price') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="number" placeholder="Nhập tên chủ tài khoản">
                </div>
                <div class="mb-6">
                    @error('price')
                        <div class=" border border-red-400 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{$message}}</strong>

                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button class="font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
