@extends('layouts')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/homePage.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

@endpush

@section('content')

<!-- Hero Section -->
<section class="hero">
    <h1>Welcome to Our Natural Product Store</h1>
    <p>Discover the natural power of our wellness solutions</p>
    <a href="{{ route('home') }}" class="cta-btn">Shop Now</a>
</section>

<!-- Skin Message Section -->
<section class="skin-message-section d-flex align-items-center justify-content-center py-5">
<div class="container-fluid">
        <div class="row align-items-center">
            <!-- Big Heading -->
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <h1 class="display-4 fw-bold">How your skin was meant to be.</h1>
            </div>
            <!-- Small Description -->
            <div class="col-md-6 text-center text-md-start">
                <p class="lead text-muted">meant to be.<br>A new way to replenish skin tone and texture.</p>
            </div>
        </div>
    </div>
</section>


<!-- Featured Products Carousel -->
<div class="featured-products">
    <h2 class="section-title">Produits Vedettes</h2>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($products as $product)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ number_format($product->price, 0) }} د.ت</p>
                <a href="{{ route('products.show', $product->id) }}">Voir</a>
            </div>
            @endforeach
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>





<!-- Testimonials -->
<div class="container-fluid py-5 testimonial-section">
    <h1 class="mb-4 text-center">Ce que disent nos clients</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="testimonial text-center">
                <img src="{{ asset('storage/products/x.JPG') }}" alt="Clara M.">
                <p>🌿 "Produit incroyable, j'ai remarqué une différence en quelques jours seulement!"</p>
                <strong>- Clara M.</strong>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="testimonial text-center">
                <img src="{{ asset('storage/products/y.JPG') }}" alt="Julien R.">
                <p>💚 "Service rapide et produit de qualité. Je recommande fortement."</p>
                <strong>- Julien R.</strong>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="testimonial text-center">
                <img src="{{ asset('storage/products/z.JPG') }}" alt="Fatima D.">
                <p>✨ "J'adore leur mission et leurs produits naturels!"</p>
                <strong>- Fatima D.</strong>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<!-- Swiper JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 }
        }
    });


</script>
@endpush
