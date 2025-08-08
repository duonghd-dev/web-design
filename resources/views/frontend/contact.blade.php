@extends('frontend.dashboard.main')
@section('content')
<div class="contact-container">
    <div class="form-column">
        <h1>Contact Us</h1>
        <p>
            We would love to hear from you. Please fill out the form below and we will respond as soon as possible.
        </p>

        {{-- Contact Form --}}
        <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="E.g.: iDuongShop" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="E.g.: iDuongShop@example.com" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Example: #12345" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Write your message here..." required></textarea>
            </div>
            <button type="submit" class="submit-button">
                Send Message
            </button>
        </form>

        @if (session('success'))
            <div class="notification-box">{{ session('success') }}</div>
        @endif
    </div>

    <div class="info-column">
        <!-- Contact Information -->
        <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <div>
                <h4>Address</h4>
                <p>01 Nguyen Chon, Lien Chieu, Da Nang</p>
            </div>
        </div>
        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <div>
                <h4>Phone</h4>
                <p>+84 702374978</p>
            </div>
        </div>
        <div class="info-item">
            <i class="fas fa-envelope"></i>
            <div>
                <h4>Email</h4>
                <p>duonghd@idoungshop.vn</p>
            </div>
        </div>

        <div class="map-section">
            <h4>Location on Map</h4>
            <br>
            <div class="map-placeholder">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8811858313475!2d108.16293139999999!3d16.071654199999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218df0356120d%3A0x47653129d38a5066!2zMSBOZ3V54buFbiBDaMahbiwgSG_DoCBNaW5oLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDA!5e0!3m2!1svi!2s!4v1754618951476!5m2!1svi!2s" width="610" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection