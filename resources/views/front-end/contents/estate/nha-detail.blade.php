@extends('front-end.app')
@section('content')
<div class="mt-20">
    @include('front-end.components.filter')
    <!-- bg -->
    <div class="lg:pr-10 lg:pl-16 pt-10 lg:flex">
        <div class="w-full lg:w-10/12" style="background-image: url('{{ asset('images/front-end/bg-nha-detail.png')}}'); height: 400px">
        </div>
        <div class="w-2/12 hidden lg:block mx-6 p-2 bg-gray-100" style="min-height: 400px;">
            <div class="font-medium"> Người đăng </div>
            <div> {{ $new -> contact_name }} </div>    
            <div class="h-20 w-20 mt-5 bg-gray-300 rounded-full mx-auto"></div>
            <div class="bg-red-500 font-medium mt-5 py-2 text-white text-center rounded-md">0999.111.***. Hiện số</div>
            <div class="border font-medium py-2 mt-5 text-center rounded-md">Gửi mail</div>
        </div>
        <div class="text-sm ml-4 w-11/12 sm:w-1/2 top-96 flex sm:left-1/4 fixed z-2 lg:hidden p-2">
            <div class="w-1/2 bg-red-500 font-medium mt-5 py-2 text-white text-center rounded-md">0999.111.***. Hiện số</div>
            <div class="w-1/2 border bg-white font-medium py-2 mt-5 ml-3 text-center rounded-md">Gửi mail</div>
        </div>
    </div>
    <!-- thông tin -->
    <div class="lg:px-16 mt-10">
        <div class="w-full lg:w-10/12 px-1 md:px-8 xl:pl-32 font-medium text-xl">
            <div class="pb-10">{{ $new->title }}</div>
            <div class="hidden xl:block bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Loại nhà</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        <th class="w-1/8 py-1">Phòng ngủ</th>
                        <th class="w-1/8 py-1">Phòng tắm</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        <td class=" w-1/8 py-1">Văn phòng</td>
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif
                        @if ($new->house != null)
                            @if($new->house->phong_ngu != null)
                                <td class="w-1/8 py-1">{{ $new->house->phong_ngu }}</td>
                            @endif
                        @endif
                        @if ($new->house != null)
                            @if($new->house->toilet != null)
                                <td class="w-1/8 py-1">{{ $new->house->toilet }}</td>
                            @endif
                        @endif
                        @if ($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>  
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }}tr {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden lg:block xl:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Loại nhà</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        <th class="w-1/8 py-1">Phòng ngủ</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        <td class=" w-1/8 py-1">Văn phòng</td>
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif
                        @if ($new->house != null)
                            @if($new->house->phong_ngu != null)
                                <td class="w-1/8 py-1">{{ $new->house->phong_ngu }}</td>
                            @endif
                        @endif
                        @if ($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>  
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }}tr {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden md:block lg:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Loại nhà</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        <td class=" w-1/8 py-1">Văn phòng</td>
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif
                        @if ($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>  
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }}tr {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden sm:block md:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Loại nhà</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        <td class=" w-1/8 py-1">Văn phòng</td>
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if ($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>  
                        @endif
                        
                        <td class="w-1/8 py-1">{{ $new->gia }}tr {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="sm:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if ($new->house != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>  
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }}tr {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Thông tin</div>
                <div class="pt-5">
                    Thông tin căn hộ:
                    <div>- Diện tích: 75m2 thiết kế 2PN, 2WC.</div>
                    <div>- Giá bán 1.65 tỷ, căn full NT chỉ 1.95 tỷ.</div>
                    <div>- Ngoài ra bên em còn có:</div>
                    <div>+ DT 60m2, 2PN, 2WC. Sân vườn 21m2.</div>
                    <div>+ DT 77m2, 3PN, 2WC. Sân vườn 18m2.</div>
                    <div> + DT 75m2, 2PN, 2WC. Ban công 10m2.</div>
                </div>
                <div class="pt-5">
                    Tiếp giáp với các khu chế xuất Linh Trung 2, khu nhà máy Tân Hiệp Phát và khu công nghiệp Vsip, 
                    đồng nghĩa Marina Tower sẽ là nơi an cư lạc nghiệp lý tưởng cho những cư dân sẵn có tại vùng đất này. 
                    Giá trị tương lai mà Marina Tower mang đến hứa hẹn là nơi đầu tư an toàn cho bạn.
                </div>
                <div class="pt-5">
                    <div>Cách chợ đầu mối nông sản Thủ Đức 3km.</div>
                    <div>Cách làng đại học, KCX Linh Trung 2, KCN Vsip, Nhà máy Tân Hiệp Phát chỉ 5km.</div>
                    <div>2 phút để đến: Bệnh viện Quốc tế Hạnh Phúc.</div>
                    <div>8 phút để đến: Siêu thị Lotte Mart, Aeon Mall Canary Bình Dương.</div>
                    <div>25 phút để đến: Trung tâm TP. HCM và Bình Dương.</div>
                </div>
                <div class="pt-5">
                    Phong thủy rất đặc biệt hiếm có khó tìm:
                    <div>* Phía Bắc là mặt tiền đường nội khu dân cư Vĩnh Phú, nhìn về Bình Dương.</div>
                    <div>* Phía Tây là không gian sinh thái tự nhiên.</div>
                    <div>* Phía Nam là mặt tiền đường nội khu dân cư Vĩnh Phú, nhìn về TP. HCM.</div>
                    <div>* Phía Đông giáp với sông xanh.</div>
                </div>
                <div class="pt-5">
                    Anh chị quan tâm vui lòng liên hệ 0932779*** để có thêm thông tin chi tiết về căn hộ và hẹn xem nhà.
                    <div>Cảm ơn anh chị đã quan tâm.</div> 
                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Chi tiết bất động sản</div>
                <div class="pt-5">
                    <table class="text-sm w-full">
                        <tr class="text-center">
                            <th class="w-4/12 font-bold py-1 border">Loại bất động sản</th>
                            <th class="w-7/12 font-normal py-1 border">{{ $new->formType->name }}</th>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Khu vực</td>
                            @if($new->house != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->city->name }}</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->city->name }}</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Quận/Huyện</td>
                            @if($new->house != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->district->name }}</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->district->name }}</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Đường/phố</td>
                            @if($new->house != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->ten_duong }} @if($new->house->xaif != null) , {{ $new->house->ward->name }}@endif</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->house->ten_duong }} @if($new->house->xaif != null) , {{ $new->house->ward->name }}@endif</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Phòng ngủ</td>
                            @if ($new->house != null)
                                @if($new->house->phong_ngu != null)
                                    <td class="w-7/12 py-1 border">{{ $new->house->phong_ngu }} phòng</td>
                                @endif
                            @endif
                        
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Phòng tắm</td>
                            @if ($new->house != null)
                                @if($new->house->toilet != null)
                                    <td class="w-7/12 py-1 border">{{ $new->house->toilet }} phòng</td>
                                @endif
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Diện tích</td>
                            @if ($new->house != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->dientich }} m²</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->dientich }} m²</td>  
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Hướng</td>
                                @if($new->house->huong_nha != null)
                                    <td class="w-7/12 py-1 border">
                                        @switch($new->house->huong_nha)
                                            @case(1)
                                                Đông
                                                @break
                                            @case(2)
                                                Tây
                                                @break
                                            @case(3)
                                                Nam
                                                @break
                                            @case(4)
                                                Bắc
                                                @break
                                            @case(5)
                                                Đông Bắc
                                                @break
                                            @case(6)
                                                Tây Bắc
                                                @break
                                            @case(7)
                                                Đông Nam
                                                @break
                                            @case(8)
                                                Tây Nam
                                                @break
                                            @default
                                                &nbsp
                                                @break
                                        @endswitch
                                    </td>
                                @endif
                        </tr>
                    </table>
                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Thông tin đơn vị bán</div>
                <div class="pt-5">
                    <table class="text-sm w-full">
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Đơn vị</td>
                            <td class="w-7/12 bg-gray-100 py-1">Cá nhân</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Tên</td>
                            <td class="w-7/12 py-1">{{ $new->contact_name }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Nơi sống</td>
                            <td class="w-7/12 bg-gray-100 py-1">{{ $new->address }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Số dự án</td>
                            <td class="w-7/12 py-1">1000</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Ngày đăng</td>
                            <td class="w-7/12 bg-gray-100 py-1">{{ $new->startTime }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Ngày hết hạn</td>
                            <td class="w-7/12 py-1">{{ $new->endTime }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Số người liên hệ</td>
                            <td class="w-7/12 bg-gray-100 py-1">5</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl pb-5 font-bold">Xem trên bản đồ</div>
                <div class="w-full h-60 bg-gray-100"></div>
            </div>
        </div>

        <div>
            <div class="text-xl pb-5 pt-20 font-bold">
                Bất động sản cùng khu vực
            </div>
        <div>
            <div class="mt-5 w-full flex justify-between items-center">
                <div class="housePreviewBox housePreview flex-col">
                    <div>
                        <img class="w-full" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                            alt="">
                    </div>
                    <div class="pt-4 px-5 font-medium">Bán hoặc cho thuê nhà 5 tầng mặt tiền 10,5m</div>
                    <div class="py-1 px-5 text-sm font-light" style="color: #888686;">Linh Đàm, Hoàng Mai, Hà Nội</div>
                    <div class="px-5">
                        <div class="w-full flex justify-between py-1 font-medium"
                            style="border-top: solid 1px #C4C4C4;">
                            <div>3</div>
                            <div>2</div>
                            <div>100m2</div>
                            <div class="font-light" style="color: #888686;">
                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                Chung cư
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-1 font-medium">Giá: 5 tỷ</div>
                </div>
                <div class="housePreviewBox housePreview flex-col">
                    <div>
                        <img class="w-full" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                            alt="">
                    </div>
                    <div class="pt-4 px-5 font-medium">Bán hoặc cho thuê nhà 5 tầng mặt tiền 10,5m</div>
                    <div class="py-1 px-5 text-sm font-light" style="color: #888686;">Linh Đàm, Hoàng Mai, Hà Nội</div>
                    <div class="px-5">
                        <div class="w-full flex justify-between py-1 font-medium"
                            style="border-top: solid 1px #C4C4C4;">
                            <div>3</div>
                            <div>2</div>
                            <div>100m2</div>
                            <div class="font-light" style="color: #888686;">
                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                Chung cư
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-1 font-medium">Giá: 5 tỷ</div>
                </div>
                <div class="housePreviewBox housePreview flex-col">
                    <div>
                        <img class="w-full" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                            alt="">
                    </div>
                    <div class="pt-4 px-5 font-medium">Bán hoặc cho thuê nhà 5 tầng mặt tiền 10,5m</div>
                    <div class="py-1 px-5 text-sm font-light" style="color: #888686;">Linh Đàm, Hoàng Mai, Hà Nội</div>
                    <div class="px-5">
                        <div class="w-full flex justify-between py-1 font-medium"
                            style="border-top: solid 1px #C4C4C4;">
                            <div>3</div>
                            <div>2</div>
                            <div>100m2</div>
                            <div class="font-light" style="color: #888686;">
                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                Chung cư
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-1 font-medium">Giá: 5 tỷ</div>
                </div>
                <div class="housePreviewBox housePreview flex-col">
                    <div>
                        <img class="w-full" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                            alt="">
                    </div>
                    <div class="pt-4 px-5 font-medium">Bán hoặc cho thuê nhà 5 tầng mặt tiền 10,5m</div>
                    <div class="py-1 px-5 text-sm font-light" style="color: #888686;">Linh Đàm, Hoàng Mai, Hà Nội</div>
                    <div class="px-5">
                        <div class="w-full flex justify-between py-1 font-medium"
                            style="color: #383838;border-top: solid 1px #C4C4C4;">
                            <div>3</div>
                            <div>2</div>
                            <div>100m2</div>
                            <div class="font-light" style="color: #888686;">
                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                Chung cư
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-1 font-medium" style="color: #696969;">Giá: 5 tỷ</div>
                </div>
            </div>
        </div>
            <div class="mt-8 flex justify-center">
                <div class="px-8 py-2 rounded" style="border: solid 1px #C4C4C4;">
                    <a class="text-black font-medium" href="#">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection