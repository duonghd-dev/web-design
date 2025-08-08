@extends('frontend.dashboard.main') @section('title', 'Shoe - iDuongShop')
@section('content')
<div class="container content-grid">
    <aside class="sidebar">
        <div class="breadcrumb">
            <a href="index.html">Home</a>
            <span class="breadcrumb-separator">></span>
            <a href="product_list.html">Product</a>
        </div>

        <div class="search-product">
            <form action="{{ route('products.search') }}" method="Get">
                @csrf
                <input type="text" name="keyword" placeholder="Search product..." value="{{ request('keyword') }}">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <form action="{{ route('products.searchCate') }}" method="GEt" id="filterForm">
            @csrf
            <ul>
            @foreach ($categories as $category)
                <li>
                    <label>
                        <input 
                            type="checkbox" 
                            name="category[]" 
                            class="category-filter" 
                            value="{{ $category->id }}"
                            {{ in_array($category->id, request()->input('category', [])) ? 'checked' : '' }}
                        >
                        <span>{{ $category->name }}</span>
                    </label>
                </li>
            @endforeach
            </ul>
        </form>
    </aside>

    <!-- Product Grid -->

    <div class="product-grid">
        @forelse ($list_product as $product)
            <div class="product-card">
                <img
                    src="{{ $product->image_url ? asset($product->image_url) : 'https://via.placeholder.com/150' }}"
                    alt="{{ $product->name }}"
                    class="product-image"
                />
                <div class="product-details">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="product-description">{{ $product->description ?? 'No description' }}</p>
                    <div class="price-and-btn">
                        <span class="product-price">{{ number_format($product->price, 0, ',', '.') }} $</span>
                        <button class="add-to-cart-btn" data-id="{{ $product->id }}">Add to cart</button>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    <div id="notification-box"></div>
</div>
@endsection
