<div class="container header-content">
    <div class="logo">
        <a href="{{ asset('/') }}">
            <img
                src="{{ asset('fontend/asset/img/logo.png') }}"
                alt="Shop iDuong"
            />
        </a>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="{{ asset('product') }}">Product</a></li>
            <li><a href="{{ route('cart.index') }}">Cart</a></li>
            <li><a href="{{ route('contact.form') }}">Contact</a></li>
            <li><a href="{{ route('profile.edit') }}">My Profile</a></li>
            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login.form') }}">Login</a></li>
            @endauth
        </ul>
    </nav>
</div>
