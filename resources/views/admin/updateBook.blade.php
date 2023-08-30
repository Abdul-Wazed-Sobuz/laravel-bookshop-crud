@extends('partials.adminMain')

@section('title', 'Update Book')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/addBook.css')}}">
@endsection

@section('content')
    <section class="body">
        <div class="container">
            <h2>Edit Book</h2>
            @if(session('success'))
                <div class="success-message" id="successMessage">{{ session('success') }}</div>
            @endif
            <form action="{{ route('book.update', ['id' => $book->book_id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="input-group">
                    <input type="text" id="title" name="title" value="{{$book->title}}" placeholder="title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="text" id="author" name="author" value="{{$book->author}}" placeholder="author">
                    @error('author')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="file" id="image" name="image" accept="image/*">
                    <img style="width: 100px" height="100px" src="{{asset('images/books/'.$book->image) }}" alt="no image">
                    @error('image')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="text" id="date" name="date" value="{{$book->date}}" placeholder="publication year">
                    @error('date')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <button class="sub" type="submit">Update</button>
            </form>
        </div>
        <script src="{{asset('js/message.js')}}"></script>
    </section>

@endsection
