@extends('partials.main')

@section('title', 'Signup Page')

@section('styles')
    @parent
    <link rel="stylesheet" href={{asset('css/signup.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <section class="body">
        <div class="container">
            <h2>Sign Up</h2>
            <form action="#" method="post">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" value="{{old('username')}}" placeholder="Username">
                    @error('username')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password"  placeholder="Password">
                    <i class="far fa-eye" id="togglePassword"></i>
                    @error('password')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="confirmPassword" name="confirmPassword"  placeholder="Confirm Password">
                    <i class="far fa-eye" id="toggleConfirmPassword"></i>
                    @error('confirmPassword')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <button class="sub" type="submit">Sign Up</button>
                <div class="login-option">
                    <br>
                    <span>Already have an account?</span>
                    <a href="/login">Log in</a>
                </div>
            </form>
        </div>
    </section>


    <script src="{{asset('/js/signup.js')}}"></script>

@endsection
