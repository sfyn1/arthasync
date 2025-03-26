@extends('layouts.home')
@section('content')
<div class="container-fluid px-0">
  <!-- Hero Section -->
  <div class="hero-section bg-gradient-primary text-white py-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="font-weight-bold mb-4">Take Control of Your Finances with <span class="text-warning">ArthaSync</span></h1>
          <p class="lead mb-4">Simple, intuitive personal finance tracking that helps you understand your spending habits and achieve your financial goals.</p>
          
          <div class="d-flex flex-wrap gap-3 mb-5">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 py-3 rounded-pill font-weight-bold">
              Get Started - It's Free
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
              Existing User? Login
            </a>
          </div>
          
          <div class="d-flex align-items-center">
            <div class="mr-3">
              <i class="fas fa-check-circle text-success"></i> No credit card required
            </div>
            <div>
              <i class="fas fa-check-circle text-success"></i> 100% secure
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
          <img src="img/dashboard.png" alt="ArthaSync Dashboard Preview" class="img-fluid rounded shadow-lg">
        </div>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="container py-5 my-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Why Choose ArthaSync?</h2>
      <p class="lead text-muted">Everything you need to manage your personal finances</p>
    </div>
    
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="bg-primary text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; line-height: 60px;">
              <i class="fas fa-chart-line fa-lg"></i>
            </div>
            <h5 class="font-weight-bold">Expense Tracking</h5>
            <p class="text-muted">Easily track where your money goes with intuitive categorization.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="bg-success text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; line-height: 60px;">
              <i class="fas fa-bullseye fa-lg"></i>
            </div>
            <h5 class="font-weight-bold">Budget Goals</h5>
            <p class="text-muted">Set and achieve your financial goals with personalized budgets.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="bg-info text-white rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; line-height: 60px;">
              <i class="fas fa-mobile-alt fa-lg"></i>
            </div>
            <h5 class="font-weight-bold">Anywhere Access</h5>
            <p class="text-muted">Access your financial data anytime, anywhere on any device.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA Section -->
  <div class="bg-light py-5">
    <div class="container text-center py-5">
      <h2 class="font-weight-bold mb-4">Ready to Take Control of Your Finances?</h2>
      <p class="lead mb-5">Join thousands of users who are already managing their money smarter with ArthaSync.</p>
      <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill font-weight-bold shadow">
        Sign Up Free
      </a>
    </div>
  </div>
</div>
@endsection