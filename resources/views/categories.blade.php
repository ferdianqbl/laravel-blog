@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5">Halaman Category</h1>

  <div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-3">
      <div class="card bg-dark text-white border-0">
        <a href="/categories/{{$category->category_slug}}" class="text-white d-block text-decoration-none">
          <img src="https://source.unsplash.com/random/500x500?{{$category->category_name}}" class="card-img"
            alt="{{$category->category_name}}-img">
          <div class="card-img-overlay d-flex align-items-center p-0">
            <h5 class="card-title bg-secondary py-3 px-0 flex-fill text-center">
              {{$category->category_name}}
            </h5>
          </div>
        </a>
      </div>
    </div>

    @endforeach

  </div>
</div>
@endsection