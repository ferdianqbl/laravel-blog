<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-5">
  <div class="container">
    <a class="navbar-brand" href="/">Ferdian's Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link{{$active === 'home' ? " active" : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$active === 'about' ? " active" : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$active === 'blog' ? " active" : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$active === 'categories' ? " active" : '' }}" href="/categories">Categories</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{(auth()->user()->username)}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-journals"></i> Dashboard</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>
                  Logout</button>
              </form>
            </li>
          </ul>
        </li>

        @else
        <li class="nav-item">
          <a class="nav-link" href="/login"><i class="bi bi-airplane-engines"></i> Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>