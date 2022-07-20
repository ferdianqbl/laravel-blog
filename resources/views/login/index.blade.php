@extends('../layouts/login')

@section('container')
{{-- @dd(session()->all()) --}}

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4">
      @if (session()->has('success') || session('loginStatus'))
      <div class="alert {{session('loginStatus') ? 'alert-danger' : 'alert-success' }} alert-dismissible fade show"
        role="alert">
        {{ session('success')}} {{ session('loginStatus')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <h1 class="h3 mb-3 text-center">Please Login</h1>
      <form class="form-userData" method="POST" action="/login">
        @csrf

        <div class="form-floating">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
            placeholder="name@example.com" name="username" autofocus required value="{{old('username')}}">
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            placeholder="Password" name="password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
    </div>
  </div>
</div>

@endsection