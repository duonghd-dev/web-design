@include('frontend.parts.head')
<div class="login-container">
  <div class="logo">
    <a href="{{ url('/') }}">
      <img src="{{ asset('fontend/asset/img/logo.png') }}" alt="Logo" />
    </a>
  </div>
  
  <form method="POST" action="{{ route('login') }}" class="login-form" id="loginForm">
    @csrf

    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="iDuongShop@example.com"
        required
      />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Your password here"
        required
      />
      <a href="#" class="forgot-password">Forgot your password?</a>
    </div>

    @if(session('error'))
      <div class="error-message">{{ session('error') }}</div>
    @endif
    <button type="submit" class="sign-in-btn">Sign in</button>

    
  </form>

  <div class="create-account">
    <a href="{{ route('register.form') }}">No account? Create one here</a>
  </div>
</div>
