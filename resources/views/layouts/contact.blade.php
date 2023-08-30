@extends('partials.main')

@section('title', 'Contact Page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to reach out to us:</p>
            <ul>
                <li></li>
                <li><i class="fas fa-envelope"></i> Email: info@bookshop.com</li>
                <li><i class="fas fa-phone"></i> Phone: +8801840751103</li>
                <li><i class="fas fa-map-marker-alt"></i> Address: Shahajipara, Boro Bazar, Meherpur</li>
            </ul>
        </div>
        <div class="contact-image">
            <img src="{{ asset('images/Banner.jpg') }}" alt="Contact Image">
        </div>
    </div>
    <section class="contact-form">
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Contact Us</button>
        </form>
        <br>
    </section>
@endsection
