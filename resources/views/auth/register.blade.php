<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="{{ asset('css/loginin.css') }}">
</head>
<body>
  <div class="login-container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <!-- Name -->
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
        <x-input-error :messages="$errors->get('name')" class="error-message" />
      </div>
      <!-- Email Address -->
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
        <x-input-error :messages="$errors->get('email')" class="error-message" />
      </div>
      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
        <x-input-error :messages="$errors->get('password')" class="error-message" />
      </div>
      <!-- Confirm Password -->
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
      </div>
      <button type="submit" class="login-btn">Register</button>
      <div style="margin-top:1rem;text-align:center;">
        <a class="forgot-password" href="{{ route('login') }}">Already registered?</a>
      </div>
    </form>
  </div>
</body>
</html>
