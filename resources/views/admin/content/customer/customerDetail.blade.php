@extends('admin.app')

@section('title')
<title>Customer detail</title>
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
                        {{ $customer->full_name }}
                    </div>
                    @if ($customer->verify == 1)
                        <span class="font-medium py-1 px-3 bg-green-200 rounded-full text-green-600"> Verify </span>
                    @else
                        <span class="font-medium py-1 px-3 bg-red-200 rounded-full text-red-600"> Unverify </span>
                    @endif
                </div>

                <div class="text-lg">
                    {{ $customer->username }}
                </div>
            </div>
        </div>
        <!-- Content -->
        <div>
            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <div class="flex flex-col pl-4 text-center">
                    <div class=" text-gray-500 dark:text-primary-dark text-2xl font-medium pb-1">
                        Số CMTND/CCCD
                    </div>
                    <div class="dark:text-primary-darker text-xl font-bold">
                        {{ $customer->SSN }}
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <div class=" text-gray-500 dark:text-primary-dark text-2xl font-medium pb-3">
                                Ảnh chứng minh thư mặt trước
                            </div>
                            <div class="rounded-lg border-dashed border-2 border-black dark:border-primary-dark flex justify-center items-center">
                                <img class="" src="{{ asset('storage/ssn_front') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_front }}" alt="">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class=" text-gray-500 dark:text-primary-dark text-2xl font-medium pb-3">
                                Ảnh chứng minh thư mặt sau
                            </div>
                            <div class="rounded-lg border-dashed border-2 border-black dark:border-primary-dark flex justify-center items-center">
                                <img class="" src="{{ asset('storage/ssn_back') . "/" . $customer->SSN . "_" . $full_name . "/" . $customer->SSN_back }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b dark:border-primary-darker py-5 px-4">
                <div class="dark:text-primary-darker text-xl font-bold pb-5">
                    Thông tin cá nhân
                </div>

                <ul>
                    <li class="flex border dark:border-primary-darker py-3 px-2">
                        <div class="pr-28">
                            Họ tên:
                        </div>
                        <div class="pl-2">
                            {{ $customer->full_name }}
                        </div>
                    </li>

                    <li class="flex border dark:border-primary-darker py-3 px-2">
                        <div class="pr-4">
                            Ngày tháng năm sinh:
                        </div>
                        <div>
                            {{ $customer->DoB }}
                        </div>
                    </li>
                    @if ($customer->address != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class="pr-28">
                                Địa chỉ:
                            </div>
                            <div class="pl-1">
                                {{ $customer->address }}
                            </div>
                        </li>
                    @endif
                    @if ($customer->phone_number != null)
                        <li class="flex border dark:border-primary-darker py-3 px-2">
                            <div class=" pr-16">
                                Số điện thoại:
                            </div>
                            <div class="pl-2">
                                {{ $customer->phone_number }}
                            </div>
                        </li>
                    @endif

                    <li class="flex border dark:border-primary-darker py-3 px-2">
                        <div class="pr-28">
                            Email:
                        </div>
                        <div class="pl-4">
                            {{ $customer->email }}
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex justify-start border-b py-5 dark:border-primary-darker">
                <form class="flex-col" method="POST" action="{{ route('admin.customer.verify', ['id' => $customer->id]) }}">
                    @csrf
                    <div class="pb-5">
                        <div class="dark:text-primary-darker text-xl font-bold pl-4 pb-5">
                            Xác thực tài khoản
                        </div>
                        <div class="flex justify-between pl-4">
                            <div class="pr-10">
                                <label for="verify">Xác thực</label>
                                <input type="radio" id="verify" name="verify" value="1"
                                @if ($customer->verify == 1)
                                    checked
                                @endif>
                            </div>
                            <div>
                                <label for="unverfiy">Chưa xác thực</label>
                                <input type="radio" name="verify" id="unverify" value="0"
                                @if ($customer->verify == 0)
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
    {{-- <button class="fixed bottom-28 right-10 rounded-full
                border-primary-dark bg-white text-black
                w-12 h-12 flex justify-center items-center
                hover:bg-primary-dark hover:text-white hover:animate-bounce"
            data-bs-toggle="tooltip" data-bs-placement="left"
            title="Đăng tin"
            type="button">
        <a href="{{ route('admin.news.create', ['id' => $customer->id]) }}"><i class="fas fa-plus"></i></a>
    </button>

    <button class="fixed bottom-10 right-10 rounded-full
                border-primary-dark bg-white text-black
                w-12 h-12 flex justify-center items-center
                hover:bg-primary-dark hover:text-white hover:animate-bounce"
                type="button">
        <a href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}"><i class="fas fa-edit"></i></a>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script type="text/javascript">
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl);
    });
    </script> --}}

    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
