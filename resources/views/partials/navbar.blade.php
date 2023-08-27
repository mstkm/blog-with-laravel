<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === 'About' ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  str_contains($title, 'Post') ? 'active' : '' }}" href="/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Categories' ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>
        @guest
          <ul class="navbar-nav">
            <li class="nav-item">
              @if ($title !== 'Login' && $title !== 'Register' && $title !== 'Forgot Password' && $title !== 'Reset Password')
                <a href="/login" class="btn btn-outline-light"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              @endif
            </li>
          </ul>
        @endguest
        @auth
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        @endauth
      </div>
    </div>
  </nav>
