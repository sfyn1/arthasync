<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'ArthaSync - Personal Finance Manager')</title>
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <style>
    .hero-section {
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    .rounded-lg {
      border-radius: 1rem !important;
    }
    .shadow-soft {
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
    }
    .gap-3 {
      gap: 1rem;
    }
  </style>
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand font-weight-bold text-primary" href="/">ArthaSync</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      {{-- <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary text-white px-3 ml-2" href="{{ route('register') }}">Register</a>
          </li>
        </ul>
      </div> --}}
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer class="bg-white py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-left">
          <p class="text-muted small mb-0">&copy; {{ date('Y') }} ArthaSync. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-right">
          <a href="#" class="text-muted small mx-2">Terms</a>
          <a href="#" class="text-muted small mx-2">Privacy</a>
          <a href="#" class="text-muted small mx-2">Contact</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Javascript Vendor -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>
</body>

</html>