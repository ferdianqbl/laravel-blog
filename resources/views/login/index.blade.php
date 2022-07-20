@extends('../layouts/login')

@section('container')
{{-- @dd(session()->all()) --}}

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <h1 class="h3 mb-3 text-center">Please Login</h1>
      <form class="form-userData">
        <div class="form-floating">
          <input type="text" class="form-control" id="username" placeholder="name@example.com" name="username">
          <label for="username">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
    </div>
  </div>
</div>

@endsection