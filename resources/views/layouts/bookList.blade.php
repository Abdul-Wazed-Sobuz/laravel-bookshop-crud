@extends('partials.main')

@section('title', 'Book List')

@section('styles')
    @parent
    <link rel="stylesheet" href={{asset('css/books.css')}}>
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

@endsection

@section('content')

    <section class="book-list">
        <h2>Book List</h2>
        <ul class="books">
            @foreach($books as $book)
                <li class="book">
                    <img style="height: 130px" src="{{asset('images/books/'.$book->image) }}" alt="No book image">
                    <h3>{{$book->author}}</h3>
                    <p>{{$book->title}}</p>
                    <p>{{$book->date}}</p>
                </li>
            @endforeach
            <!-- Add more book items as needed -->
        </ul>
{{--            {{ $books->links() }}--}}
{{--        <div aria-label="Page navigation example">--}}
{{--            <ul class="pagination justify-content-end">--}}
{{--                <li class="page-item ">--}}
{{--                    <a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">{{ $books->onEachSide(1)->links() }}</li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </section>

{{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}
@endsection
