@extends('admin.app')

@section('title')
<title>Customers manager</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Customers manager</h1>
        </div>
        <!-- Content -->
        <div class=" h-screen">
            <div class="mt-2">
                <div class="overflow-x-auto flex flex-col">
                    @can('create customer')
                        <div class="flex flex-row-reverse">
                            <div class="m-6">
                                <a href="{{route('admin.customer.create')}}"
                                    class="font-bold py-2 px-4 border-2 hover:bg-white rounded-lg text-black focus:outline-none focus:shadow-outline"
                                    type="button">
                                    Thêm tài khoản
                                </a>
                            </div>
                        </div>
                    @endcan
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
                    <div class=" w-11/12  mx-auto mx-8  table-fixed pb-5">
                        {{ $customers->links() }}
                    </div>
                    <table class=" w-11/12  mx-auto mx-8  table-fixed">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Tên đầy đủ</th>
                                <th class="py-3 px-6 text-left">Tên đăng nhập</th>
                                <th class="py-3 px-6 text-left">Địa chỉ</th>
                                <th class="py-3 px-6 text-left">Số điện thoại</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">CMTND/CCCD</th>
                                <th class="py-3 px-6 text-center">Hành động</th>

                            </tr>
                        </thead>
                        <tbody class="text-sm font-light">
                            @foreach($customers as $cus)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 hover:text-black">
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <a href="{{route('admin.customer.detail',['id' => $cus->id])}}" class="align-middle hover:text-gray-400 border-b-2 border-gray-800">
                                            <span class="font-medium">{{$cus->full_name}}</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$cus->username}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium truncate overflow-hidden whitespace-nowrap">{{$cus->address}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$cus->phone_number}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium truncate overflow-hidden whitespace-nowrap">{{$cus->email}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$cus->SSN}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('admin.customer.detail', ['id' => $cus->id]) }}" class="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        {{-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('admin.customer.edit', ['id' => $cus->id]) }}" class="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div> --}}
                                        {{-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a class="" onclick="return myFunction();" href="{{ route('admin.customer.delete', ['id' => $cus->id]) }}" >
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
