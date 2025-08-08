@extends('frontend.dashboard.main')
@section('content')
    <div class="cart-container">
        <h1>Your Cart</h1>
        <div class="cart-items">
            @forelse ($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/150' }}" alt="{{ $item->product->name }}" />
                    <div class="item-details">
                        <h3 class="item-name">{{ $item->product->name }}</h3>
                        <p>{{ $item->product->description ?? 'No description available' }}</p>
                        <p class="item-price">{{ number_format($item->price, 0, ',', '.') }} $</p>
                        <div class="quantity-control">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}" class="quantity-btn decrease-btn">-</button>
                                <span class="item-quantity">{{ $item->quantity }}</span>
                                <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="quantity-btn increase-btn">+</button>
                            </form>
                        </div>
                    </div>
                    <div class="item-total">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} $</div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-item-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse
        </div>

        <div class="cart-summary">
            <div class="summary-line">
                <span>Subtotal:</span>
                <span class="subtotal">{{ number_format($subtotal, 0, ',', '.') }} $</span>
            </div>
            <div class="summary-line">
                <span>Shipping Fee:</span>
                <span class="shipping-fee">{{ number_format($shippingFee, 0, ',', '.') }} $</span>
            </div>
            <div class="summary-line total-line">
                <span>Total:</span>
                <span class="grand-total">{{ number_format($grandTotal, 0, ',', '.') }} $</span>
            </div>
        </div>

        <a href="{{ route('checkout') }}" class="checkout-btn">Proceed to Checkout</a>
    </div>
@endsection