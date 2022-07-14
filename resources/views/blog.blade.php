@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5">Halaman Blog</h1>

  <div class="row">
    @foreach($blog_posts as $post)
    <div class="col-md-4 mb-3">
      <div class="card shadow border-0" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h5 class="card-subtitle text-muted">By. <a href="#" class="text-decoration-none">
              {{ $post->user->name }}</a>,
            <a href="/categories/{{ $post->category->category_slug }}" class="text-success text-decoration-none">{{
              $post->category->category_name }}</a>
          </h5>
          <p class="card-text">{{ $post->excerpt }}
          </p>
          <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Details</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection