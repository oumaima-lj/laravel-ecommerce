<!-- about.blade.php -->
@extends('layouts')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">

@section('content')
<section class="about-hero">
  <div class="container">
    <div class="hero-text">
      <h1>How your skin was meant to be.</h1>
      <p>Meant to be. A new way to replenish skin tone and texture.</p>
    </div>
  </div>
</section>

<section class="about-story container">
  <h2>Our Story</h2>
  <p>

  Our journey began with a deep-rooted passion to restore the natural beauty and vitality
   of the skin. What started as a small vision quickly blossomed into a mission—to redefine
   skincare through honesty, simplicity, and purpose. Every formula we craft is created in
   small batches with care, using only clean, sustainable ingredients that are kind to both
   skin and the planet. We believe that true beauty is natural, unfiltered, and unique to each
   individual. That's why our products are designed not to mask imperfections, but to nourish,
    balance, and enhance what's already there. With every bottle, we aim to instill confidence,
     self-love, and a sense of empowerment—so you can feel good in your skin, every single day.  </p>
</section>

<section class="about-values">
  <div class="container values-grid">
    <div class="value-box">
      <h3>🌱 Natural Ingredients</h3>
      <p>Only the purest plant-based ingredients—no harsh chemicals.</p>
    </div>
    <div class="value-box">
      <h3>🌍 Eco-Friendly</h3>
      <p>Sustainable packaging and ethical sourcing guide every decision we make.</p>
    </div>
    <div class="value-box">
      <h3>🧪 Clinically Tested</h3>
      <p>Proven by science, backed by dermatologists, loved by real people.</p>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Meet Our Team</h2>
    <div class="team-row">

      <!-- Team Member 1 -->
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="team-card text-center">
          <img src="{{ asset('storage/products/c.JPG') }}" class="team-img rounded-circle mb-3" alt="Jane Doe">
          <h4 class="mb-1">Jane Doe</h4>
          <p class="text-muted mb-1">Founder & CEO</p>
          <p class="small">Passionate about skincare and the science behind beauty.</p>
        </div>
      </div>

      <!-- Team Member 2 -->
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="team-card text-center">
          <img src="{{ asset('storage/products/b.JPG') }}" class="team-img rounded-circle mb-3" alt="John Smith">
          <h4 class="mb-1">John Smith</h4>
          <p class="text-muted mb-1">Product Developer</p>
          <p class="small">Bringing plant-based innovation into every formulation we create.</p>
        </div>
      </div>

      <!-- Team Member 3 -->
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="team-card text-center">
          <img src="{{ asset('storage/products/a.JPG') }}" class="team-img rounded-circle mb-3" alt="Sarah Lee">
          <h4 class="mb-1">Sarah Lee</h4>
          <p class="text-muted mb-1">Marketing Director</p>
          <p class="small">Spreading our story and values with authenticity and creativity.</p>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
