@extends('partials.adminMain')

@section('title', 'Admin List')

@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/adminList.css')}}">
@endsection

@section('content')

    <section class="adminList">
        <br><br>
        <header>
            <h1>Admin List</h1>
            <!-- Navigation links here -->
        </header>
        <br><br>

        <table class="styled-table">
            <thead>
            <tr>
                <th>Account ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->account_id}}</td>
                        <td>{{$admin->username}}</td>
                        <td>{{$admin->email}}</td>
                <td>
                    <a href="#" class="action-btn edit-btn">Edit <i class="fas fa-edit"></i></a>
                    <a href="#" class="action-btn delete-btn">Delete <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
