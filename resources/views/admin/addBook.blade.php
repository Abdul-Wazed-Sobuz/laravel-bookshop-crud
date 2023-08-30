@extends('partials.adminMain')

@section('title', 'Manage Products')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/addBook.css')}}">
@endsection

@section('content')
    <section class="body">
        <div class="container">
            <h2>Add Book</h2>
            @if(session('success'))
                <div class="success-message" id="successMessage">{{ session('success') }}</div>
            @endif
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="text" id="title" name="title" placeholder="title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="text" id="author" name="author" placeholder="author">
                    @error('author')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="file" id="image" name="image" accept="image/*">
                    @error('image')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="text" id="date" name="date" placeholder="publication year">
                    @error('date')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <button class="sub" type="submit">Add</button>
            </form>
        </div>
        <script src="{{asset('js/message.js')}}"></script>
    </section>

@endsection
