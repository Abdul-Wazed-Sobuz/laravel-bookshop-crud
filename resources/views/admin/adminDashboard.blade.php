@extends('partials.adminMain')

{{--@section('title', 'Admin Dashboard')--}}
@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
@endsection
@section('content')
    <section class="dashboard">
        <header>
            <h1>Admin Dashboard</h1>
            <!-- Navigation links here -->
        </header>

        <br><br><br>
{{--        <h1>Welcome, {{session('username')}}.</h1>--}}
        <main>
            <div class="card">
                <h2>Manage Book</h2>
                <p>Add products in the inventory Control Manager.</p>
                <a href="/add-book" class="btn">Go to Products</a>
            </div>

            <div class="card">
                <h2>Manage Book List</h2>
                <p>update, and delete products in the inventory.</p>
                <a href="/booklist" class="btn">Go to Book List</a>
            </div>

            <div class="card">
                <h2>Admin List</h2>
                <p>Manage Admin accounts and permissions.</p>
                <a href="/adminlist" class="btn">Go to Admin List</a>
            </div>

            <div class="card">
                <h2>Admin Profile</h2>
                <p>Edit profile</p>
                <a href="#" class="btn">Go to Profile</a>
            </div>

            <div class="card">
                <h2>Settings</h2>
                <p>Configure application settings.</p>
                <a href="#" class="btn">Go to Settings</a>
            </div>
        </main>
    </section>
@endsection
