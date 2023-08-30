@extends('partials.main')

@section('title', 'Login Page')

@section('styles')
    @parent
    <link rel="stylesheet" href={{asset('css/login.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <section class="body">
        <div class="container">
            <h2>Login</h2>
            <form action="#" method="post">
                @csrf
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
                    <input type="password" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <br>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Me
                        </label>
                    </div>
                </div>
                <br>
                <button class="sub" type="submit">Login</button>
                <div class="signup-option">
                    <br><br>
                    <span>Don't have an account?</span>
                    <a href="/signup">Signup</a>
                </div>
            </form>
        </div>
    </section>


    <script src="{{asset('/js/signup.js')}}"></script>

@endsection
