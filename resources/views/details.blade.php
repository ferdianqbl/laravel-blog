@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5">Halaman Blog</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h5 class="card-subtitle text-muted">{{ $post->author }}</h5>
          <p class="card-text">{{ $post->body }}
          </p>
          <a href="/blog" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection