@extends('../layouts/login')

@section('container')

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-5">
      <h1 class="h3 mb-3 text-center">Register</h1>
      <form class="form-userData" action="/register" method="POST">
        @csrf
        <div class="form-floating">
          <input type="text" id="name" name="name" placeholder="name"
            class="form-control @error('name') is-invalid @enderror" required value="{{old('name')}}">
          <label for="name">Name</label>

          @error('name')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            placeholder="name@example.com" required value="{{old('email')}}">
          <label for="email">Email</label>

          @error('email')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username"
            placeholder="Username" required value="{{old('username')}}">
          <label for="username">Username</label>

          @error('username')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
            name="password" placeholder="Password" required>
          <label for="password">Password</label>

          @error('password')
          <div class="invalid-feedback mb-3">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already registered? <a href="/login">Login Now!</a></small>
    </div>
  </div>
</div>

@endsection