@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5 text-center">Halaman Detail Blog</h1>

  <div class="row">
    <div class="col-12">
      <div class="card shadow border-0">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h5 class="card-subtitle text-muted">By. <a href="/authors/{{$post->author->username}}"
              class="text-decoration-none">{{ $post->author->name }}</a>,
            <a href="/categories/{{$post->category->category_slug}}"
              class="text-success">{{$post->category->category_name}}</a>
          </h5>
          <p class="card-text">{{ $post->body }}
          </p>
          <a href="/blog" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection