@extends('layouts')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endpush

@section('content')
<div class="container py-5">
    <div class="product-wrapper">

        {{-- Image on the left --}}
        <div class="product-image">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        {{-- Details on the right --}}
        <div class="product-details">
            <h2>{{ $product->name }}</h2>
            <div class="price">{{ number_format($product->price, 0) }} د.ت</div>
            <p>{{ $product->description }}</p>

            <div class="product-actions">
                <div class="quantity-pill">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                </div>
                <button class="btn action-button">Buy Now</button>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-dark px-4 py-2 rounded-pill">Add To Cart</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: { delay: 3000 },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 4 }
      }
    });
  });
</script>
@endpush
