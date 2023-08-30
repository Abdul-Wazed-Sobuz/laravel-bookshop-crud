@extends('partials.adminMain')

@section('title', 'Book List')

@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/updateBook.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


@endsection

@section('content')

    <section class="bookList">
        <br><br>
        <header>
            <h1>Book List</h1>
            <!-- Navigation links here -->
        </header>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Book Photo</th>
                <th>Publication</th>
                <th>Actions</th>
            </tr>
            </thead>
            @if(session('success'))
                <div class="success-message" id="successMessage">{{ session('success') }}</div>
            @endif
            <tbody>
            @php
                $serialNumber = ($books->currentPage() - 1) * $books->perPage() + 1;
            @endphp
            @foreach($books as $key=>$book)
                <tr>
                    <td>{{$serialNumber++}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td><img style="height: 130px" height="150px" src="{{asset('images/books/'.$book->image) }}" ></td>
                    <td>{{$book->date}}</td>
                    <form action="{{ route('delete.book', ['id' => $book->book_id]) }}" id="delete-form-{{ $book->book_id }}" method="post">
                        @csrf
                        @method('delete')
                        <td>
                            <a href="{{route('update.book', ['id'=>$book->book_id])}}" class="action-btn edit-btn">Edit <i class="fas fa-edit"></i></a>
{{--                            <a href="{{route('delete.book', ['id'=>$book->book_id])}}" data-method="delete" class="action-btn delete-btn" onclick="event.preventDefault(); deleteBook('{{ route('delete.book', ['id' => $book->book_id]) }}');">Delete <i class="fas fa-trash-alt"></i></a>--}}
                            <button type="submit" class="action-btn delete-btn">
                                Delete <i class="fas fa-trash-alt"></i>
                            </button>

                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item ">
                    <a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a>
                </li>
                <li class="page-item">{{ $books->onEachSide(1)->links() }}</li>
                <li class="page-item">
                    <a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
        <script src="{{asset('js/message.js')}}"></script>
    </section>
{{--    <script>--}}
{{--        function deleteBook(url) {--}}
{{--            if (confirm('Are you sure to delete?')) {--}}
{{--                const successMessage = document.getElementById('success-message');--}}

{{--                axios.delete(url)--}}
{{--                    .then(response => {--}}
{{--                        if (successMessage) {--}}
{{--                            successMessage.style.display = 'block';--}}
{{--                            setTimeout(function() {--}}
{{--                                successMessage.style.display = 'none';--}}
{{--                            }, 5000);--}}
{{--                        }--}}
{{--                        // Handle success, e.g., show a success message or refresh the page--}}
{{--                    })--}}
{{--                    .catch(error => {--}}
{{--                        // Handle error, e.g., show an error message--}}
{{--                    });--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}


{{--    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

@endsection
