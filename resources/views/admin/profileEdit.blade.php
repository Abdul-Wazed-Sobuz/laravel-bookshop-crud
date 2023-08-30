@extends('partials.adminMain')

@section('title', 'Profile Edit')

@section('styles')
    @parent
    <link rel="stylesheet" href={{asset('css/signup.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <section class="body">
        <div class="container">
            <h2>Profile Edit</h2>
            @if(session('success'))
                <div class="success-message" id="successMessage">{{ session('success') }}</div>
            @endif
            <form action="#" method="post">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" value="{{session('username')}}" placeholder="Username">
                    @error('username')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" value="{{session('email')}}" placeholder="Email" readonly>
                    @error('email')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" id="phone" name="phone"  placeholder="Phone">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-location-dot"></i>
                    <input type="text" id="address" name="address"  placeholder="Address">
                    @error('address')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-calendar-days"></i>
                    <input type="date" id="dob" name="dob"  placeholder="Date of Birth">
                    @error('dob')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="gender" value="male">

                    <label for="female">Female</label>
                    <input type="radio" id="female" name="gender" value="female">
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <br>
                <div class="input-group">
                    <input type="file" id="image" name="image" accept="image/*">
                    <img style="width: 100px" height="100px" src="" alt="no image">
                    @error('image')
                    <span class="text-danger">{{$message}}</span><br>
                    @enderror
                </div>
                <br>
                <button class="sub" type="submit">Update Profile</button>
                <br><br>
            </form>
        </div>
    </section>


    <script src="{{asset('/js/signup.js')}}"></script>

@endsection
