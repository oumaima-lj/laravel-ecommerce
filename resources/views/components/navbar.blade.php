<nav class="custom-navbar">
  <div class="container d-flex justify-content-center align-items-center gap-4 py-3 flex-wrap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- Logo -->
    <a href="/" class="navbar-brand text-white fs-4 fw-bold m-0">MyShop</a>

    <!-- Nav Links -->
    <ul class="nav gap-4 m-0">
      <li class="nav-item"><a class="nav-link text-white" href="/effects">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="{{ route('home') }}">Shop</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="/aboutus">About</a></li>
      @if(auth()->check() && auth()->user()->role === 'admin')
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Go to Dashboard</a></li>
      @endif
    </ul>

    <!-- Search Form -->
    <form action="{{ route('products.search') }}" method="GET" class="d-flex align-items-center" style="gap: 0.5rem;">
      <input type="text" name="search" class="form-control" placeholder="Search products..." style="width: 180px;">
      <button type="submit" class="btn btn-outline-light"><i class="bi bi-search"></i></button>
    </form>

    <!-- Icons + Profile -->
    <div class="d-flex gap-3 align-items-center">
      <a href="{{ route('liked.items') }}" class="text-white text-decoration-none"><i class="bi bi-heart-fill"></i></a>
      <a href="{{ route('cart.index') }}" class="text-white text-decoration-none"><i class="bi bi-cart-fill"></i></a>

      <!-- Profile Roll-down -->
      <div class="profile-menu-container position-relative">
        <a href="#" class="text-white text-decoration-none profile-icon" onclick="toggleProfileMenu(event)">
          <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
        </a>
        <div class="profile-menu">
          @guest
            <a class="profile-menu-item" href="{{ route('login') }}">Login</a>
            <a class="profile-menu-item" href="{{ route('register') }}">Register</a>
          @else
            <a class="profile-menu-item" href="{{ route('profile.edit') }}">Edit Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
              @csrf
              <button type="submit" class="profile-menu-item" style="background:none;border:none;width:100%;text-align:left;">Logout</button>
            </form>
          @endguest
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
console.log('Profile menu toggle script loaded');

function toggleProfileMenu(event) {
  event.preventDefault();
  const container = event.target.closest('.profile-menu-container');
  const menu = container.querySelector('.profile-menu');
  menu.classList.toggle('show');
}

// Hide menu when clicking outside
document.addEventListener('click', function(event) {
  document.querySelectorAll('.profile-menu').forEach(menu => {
    const container = menu.closest('.profile-menu-container');
    const icon = container.querySelector('.profile-icon');
    if (!menu.contains(event.target) && !icon.contains(event.target)) {
      menu.classList.remove('show');
    }
  });
});
</script>
