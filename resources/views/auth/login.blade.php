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
    <h2>Login</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
        <x-input-error :messages="$errors->get('email')" class="error-message" />
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
        <x-input-error :messages="$errors->get('password')" class="error-message" />
      </div>

      <!-- Remember Me -->
      <div class="remember-me">
        <input type="checkbox" id="remember_me" name="remember" />
        <label for="remember_me">Remember me</label>
      </div>

      <!-- Forgot Password -->
      @if (Route::has('password.request'))
        <a class="forgot-password" href="{{ route('password.request') }}">
          Forgot your password?
        </a>
      @endif

      <button type="submit" class="login-btn">Log In</button>
    </form>
    <div style="margin-top:1rem;text-align:center;">
      <a class="forgot-password" href="{{ route('register') }}">Don't have an account? Register</a>
    </div>
  </div>
</body>
</html>
