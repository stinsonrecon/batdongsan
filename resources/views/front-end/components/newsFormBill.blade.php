<div class="mb-4">
    <label for="" class="text-black">Loại tin đăng</label>
    <select
        name="loai_tin"
        id="loai_tin"
        class="border border-gray-300 rounded outline-none text-black py-2 px-2 w-full appearance-none">
        @foreach ($loai_tin as $lt)
            <option value="{{ $lt->id }}">{{ $lt->name }}</option>
        @endforeach
    </select>
</div>

<script type="text/javascript">
    $('#loai_tin').on('change', function() {
        get_price();
    });
    function get_price(){
        var loai_tin_id = $('#loai_tin').val();
        $.post('{{route('client.getNewsPrice')}}',{_token:'{{ csrf_token() }}', loai_tin:loai_tin_id}, function(data){
            $('#loai_tin_price').html(null);
            $('#loai_tin_price').append($('<div id="loai_tin_price">Đơn giá/ngày: </div>', {
            }));

            var gia = `${data[0].gia}`;

            gia = numberWithCommas(gia);

            $( "#loai_tin_price" ).append( `<span id="price" class="hidden">${data[0].gia}</span>`);

            $( "#loai_tin_price" ).append( `<span id="price-fake"></span>`);

            $( "#price-fake" ).append( document.createTextNode( gia ) );

            var totalPrice = document.getElementById('totalPrice');

            let price = document.getElementById('price').textContent || document.getElementById('price').innerText;

            var current = document.getElementById('startTime').value;

            var end = document.getElementById('endTime').value;

            var date1 = new Date(current);

            var date2 = new Date(end);

            var diffTime = Math.abs(date2 - date1);

            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            var showDay = document.getElementById('diffDay');

            showDay.innerHTML =  diffDays;

            totalPrice.innerHTML = numberWithCommas(diffDays*price);
        });
    }
</script>

<div class="mb-4">
    <label for="" class="text-black">Ngày bắt đầu</label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-primary-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>

        <input class="shadow appearance-none border rounded w-full py-2 px-3
                leading-tight focus:outline-none focus:shadow-outline text-black block pl-10 p-2.5" type="text"
                id="startTime" name="startTime" value="{{ $current_time }}" onchange="diffDay()"
                onfocus="(this.type='date')"
                onfocusout="(this.type='text')">
    </div>
</div>

<div class="mb-4 border-b border-gray-400 pb-4">
    <label for="" class="text-black">Ngày kết thúc</label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-primary-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>

        <input class="shadow appearance-none border rounded w-full py-2 px-3
                leading-tight focus:outline-none focus:shadow-outline text-black block pl-10 p-2.5" type="text"
                id="endTime" name="endTime" value="{{ $end_time }}" onchange="diffDay()"
                onfocus="(this.type='date')"
                onfocusout="(this.type='text')">
    </div>
</div>

<div id="loai_tin_price" class="flex mb-4 text-black">
    Đơn giá/ngày: <span id="price" class="hidden">{{ $loai_tin[0]->gia }}</span> <span>{{ number_format($loai_tin[0]->gia) }}</span>
</div>

<div class="mb-4 text-black">
    Số ngày: <span id="diffDay"></span>
</div>

<div style="color: #EF562D;" class="text-lg font-semibold border-b pb-3 border-gray-400 mb-4">
    Số tiền: <span id="totalPrice" class=" text-sm"></span> <span class="text-sm"> VND</span>
</div>

<div class="text-sm font-medium text-black">
    Lưu ý
</div>
<i class="text-xs text-black">
    Bạn sẽ chuyển tiền đến tài khoản và tin đăng sẽ được kiểm duyệt ngay sau đó .
</i>

<script>
    function diffDay(){
        var totalPrice = document.getElementById('totalPrice');

        let price = document.getElementById('price').textContent || document.getElementById('price').innerText;

        var current = document.getElementById('startTime').value;

        var end = document.getElementById('endTime').value;

        var date1 = new Date(current);

        var date2 = new Date(end);

        var diffTime = Math.abs(date2 - date1);

        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        var showDay = document.getElementById('diffDay');

        showDay.innerHTML =  diffDays;

        totalPrice.innerHTML = numberWithCommas(diffDays*price);
    }
    var totalPrice = document.getElementById('totalPrice');

    var price = document.getElementById('price').textContent || document.getElementById('price').innerText;

    var current = document.getElementById('startTime').value;

    var end = document.getElementById('endTime').value;

    var date1 = new Date(current);

    var date2 = new Date(end);

    var diffTime = Math.abs(date2 - date1);

    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var showDay = document.getElementById('diffDay');

    showDay.innerHTML =  diffDays;

    totalPrice.innerHTML = numberWithCommas(diffDays*price);

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>

