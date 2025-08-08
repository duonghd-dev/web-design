@extends('frontend.dashboard.main')

@section('content')
<div class="profile-container">
    <h1 class="profile-title">My Profile</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="form-layout">
        @csrf
        @method('PUT')

        <div class="section-divider">
            <h2 class="section-heading">Personal Information</h2>
            <div class="form-group-container">
                <div>
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-input">
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" disabled class="form-input form-input-disabled">
                </div>
            </div>
        </div>

        <div class="section-divider">
            <h2 class="section-heading">Change Password</h2>
            <div class="form-group-container">
                <div>
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-input">
                </div>
                <div>
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-input">
                </div>
                <div>
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-input">
                </div>
            </div>
        </div>

        <div class="button-container">
            <button type="submit" class="submit-button">
                Save Changes
            </button>
        </div>
    </form>
</div>

<div id="notification-box" class="notification-box"></div>
@endsection
