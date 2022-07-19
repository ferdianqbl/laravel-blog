@extends('./layouts/main')

@section('container')
<div class="container">
  <h6 class="mb-3 text-black-50">Halaman Detail Blog</h6>

  <div class="row justify-content-center align-items-center">
    <div class="col-8">
      <div class="card border-0">
        <div class="card-body">
          <h1 class="card-title text-center mb-3">{{ $post->title }}</h1>
          <p class="card-subtitle text-muted">By. <a href="/blog?author={{$post->author->username}}"
              class="text-decoration-none text-info">{{ $post->author->name }}</a>,
            <a href="/blog?category={{$post->category->category_slug}}"
              class="text-success text-decoration-none">{{$post->category->category_name}}</a>
            <small class="text-muted d-block">Last updated {{$post->updated_at->diffForHumans()}}</small>
          </p>
          <img src="https://source.unsplash.com/random/1200x400?{{$post->category->category_name}}"
            class="card-img-top img-fluid my-3 rounded" alt="{{$post->category->category_name}}-img">
          <p class="card-text">{!!$post->body!!}
          </p>
          <a href="/blog" class="">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection