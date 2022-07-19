<ul>
    <li class="side-menu-item">
        <a class="rounded-t  pt-1 pb-2 px-4 block whitespace-no-wrap hover:text-orange-600 " href="{{ route('client.news.create') }}">
            Đăng mới
        </a>
    </li>
    <li class="side-menu-item">
        <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.postedNews.index') }}">
            Tin đã đăng
        </a>
    </li>
    <li class="side-menu-item">
        <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.info.edit') }}">
            Thay đổi thông tin
        </a>
    </li>
    <li class="side-menu-item">
        <a class=" py-2 px-4 block whitespace-no-wrap hover:text-orange-600" href="{{ route('account.password.edit') }}">
            Đổi mật khẩu
        </a>
    </li>
    <li class="side-menu-item">
        <form action="{{ route('client.logout') }}" method="POST">
            @csrf
            <button type="submit" class="rounded-b py-2 px-4 block whitespace-no-wrap hover:text-orange-600">
                Đăng xuất
            </button>
        </form>
    </li>
</ul>
