@extends('layouts')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] py-12">
    <div class="text-5xl text-pink-500 mb-4">
        <i class="fas fa-heart"></i>
    </div>
    <h2 class="text-2xl font-bold mb-4">Your order is placed, thank you for trusting us!</h2>
    <p class="text-lg text-gray-600">We appreciate your business and hope you enjoy your purchase.</p>
    <a href="{{ route('home') }}" class="mt-6 inline-block bg-black text-white px-6 py-2 rounded">Back to Home</a>
</div>
@endsection
