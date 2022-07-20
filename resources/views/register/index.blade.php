@extends('../layouts/login')

@section('container')

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-5">
      <h1 class="h3 mb-3 text-center">Register</h1>
      <form class="form-userData">
        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
          <label for="name">Name</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          <label for="username">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already registered? <a href="/login">Login Now!</a></small>
    </div>
  </div>
</div>

@endsection