@extends('frontend.parts.head')
<div class="login-container">
  <div class="logo">
    <a href="{{ url('/') }}">
      <img src="{{ asset('fontend/asset/img/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <form method="POST" action="{{ route('register') }}" class="login-form" id="registerForm">
    @csrf

    <div class="form-group">
      <label for="name">Full Name</label>
      <input
        type="text"
        id="name"
        name="name"
        placeholder="Your full name"
        value="{{ old('name') }}"
        required
      />
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="iDuongShop@example.com"
        value="{{ old('email') }}"
        required
      />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Create a password"
        required
      />
    </div>

    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input
        type="password"
        id="password_confirmation"
        name="password_confirmation"
        placeholder="Confirm your password"
        required
      />
    </div>

    <button type="submit" class="sign-in-btn">Create Account</button>

    @if ($errors->any())
      <div class="error-message">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </form>

  <div class="create-account">
    <a href="{{ route('login.form') }}">Already have an account? Login here</a>
  </div>
</div>
