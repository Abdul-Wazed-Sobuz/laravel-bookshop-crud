
<header class="header">
    <div class="logo">
        <img src="{{asset('images/bookShop.png')}}" alt="Bookshop Logo">
    </div>
    <nav class="navigation">
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('books')}}">Books</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav>
    <div class="search-bar">
        <input type="text" placeholder="Search books...">
        <button>Search</button>
    </div>
</header>

