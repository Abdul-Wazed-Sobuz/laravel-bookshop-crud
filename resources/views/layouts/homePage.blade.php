@extends('partials.main')

@section('styles')
    @parent
    <link rel="stylesheet" href={{asset('css/banner.css')}}>
    <link rel="stylesheet" href={{asset('css/card.css')}}>
@endsection

@section('content')

    <section class="home">
        <!--Banner -->
        <div class="banner">
            <img src="{{asset('images/Banner.jpg')}}" alt="No Banner">
        </div>
        <!--Banner end-->

        <div class="introduction">
            <div class="intro">
                <p>Welcome to our bookshop website, a literary haven for all book lovers. Explore our diverse collection of books, from timeless classics to modern bestsellers. Immerse yourself in captivating stories and enrich your mind with knowledge. Discover your next adventure within our virtual shelves. Happy reading!</p>
            </div>
        </div>
    </section>

@endsection
