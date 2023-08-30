
<header class="header">
    <div class="logo">
        <img src="{{asset('images/bookShop.png')}}" alt="Bookshop Logo">
    </div>
    <nav class="navigation">
        <ul>
            <li><a href="{{route('dashboard')}}">DashBoard</a></li>
            <li><a href="{{route('booklist')}}">Book List</a></li>
            <li><a href="{{route('adminList')}}">Admin List</a></li>
            <li><a href="#">{{session('username')}} </a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </nav>
{{--    <div class="search-bar">--}}
{{--        <input type="text" placeholder="Search books...">--}}
{{--        <button>Search</button>--}}
{{--    </div>--}}
</header>

