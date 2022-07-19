@extends('front-end.app')
@section('content')
<div class="mt-20 bg-gray-100">
    @include('front-end.components.banner-news')
    <form action="" method="POST" role="form">
            @csrf
            <div class="grid justify-items-stretch p-2">
        <div class="mt-10 text-center text-orange-600 font-bold text-xl">
            Thay đổi mật khẩu
        </div>
        <div class="justify-self-center sm:w-2/3 md:w-7/12 p-2 w-full drop-shadow-md bg-white mt-4 mb-5 rounded-md">
            <div class="lg:flex md:ml-8 mt-2 md:mr-8 lg:mt-8">
                <div class="font-bold lg:w-1/4">Mật khẩu cũ</div>
                <input class="w-full lg:w-2/3 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" name="password" type="password">
            </div>
            <div class="lg:flex md:ml-8 mt-2 md:mr-8 lg:mt-8">
                <div class="font-bold lg:w-1/4">Mật khẩu mới</div>
                <input class="w-full lg:w-2/3 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" name="newpass" type="password">
            </div>
            <div class="lg:flex md:ml-8 mt-2 md:mr-8 lg:mt-8">
                <div class="font-bold lg:w-1/4">Nhập lại mật khẩu mới</div>
                <input class="w-full lg:w-2/3 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" name="confirmpass" type="password">
            </div>
            <div class="md:ml-4 lg-ml-12">
                <div class=" text-red-500 pt-4 italic">
                    @if (session('yes'))
                    <div class="alert text-center alert-success">
                        <p>{{ session('yes') }}</p>
                    </div>
                    @endif
                    @if (session('no1'))
                    <div class="alert text-center alert-success">
                        <p>{{ session('no1') }}</p>
                    </div>
                    @endif
                    @if (session('no2'))
                    <div class="alert text-center alert-success">
                        <p>{{ session('no2') }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="md:ml-4 lg-ml-12">
                <div class="text-gray-400 py-8 italic">
                    <a href="{{ route('account.password.forget')}}">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
        <div class="justify-self-center py-8">
            <button type="submit" class="px-3 py-2 hover:bg-black rounded bg-orange-600 text-md text-white font-bold">Đổi mật khẩu</button>
        </div>
    </div>
    </form>
</div>
@endsection