@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5 text-center">Halaman <span class="text-primary">{{$title}}</span></h1>

  @if ($blog_posts->count())
  <div class="card mb-3 border-0 shadow">
    <img src="https://source.unsplash.com/random/1200x400?{{$blog_posts[0]->category->category_name}}"
      class="card-img-top" alt="{{$blog_posts[0]->category->category_name}}-img">
    <div class="card-body text-center">
      <h3 class="card-title">{{$blog_posts[0]->title}}</h3>
      <h6 class="card-subtitle mb-2 text-muted">
        By. <a class="text-decoration-none text-info"
          href="/authors/{{$blog_posts[0]->author->username}}">{{$blog_posts[0]->author->name}}</a>,
        <a href="/categories/{{$blog_posts[0]->category->category_slug}}"
          class="text-decoration-none text-success">{{$blog_posts[0]->category->category_name}}</a>
        <small class="text-muted d-block">Last updated {{$blog_posts[0]->updated_at->diffForHumans()}}</small>
      </h6>
      <p class="card-text">{{$blog_posts[0]->excerpt}}</p>
      <a href="/blog/{{ $blog_posts[0]->slug }}" class="btn btn-primary">Details</a>
    </div>
  </div>

  @else
  <p class="text-center fs-3">No Post Found.</p>
  @endif

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($blog_posts->skip(1) as $post)
    <div class="col mb-3">
      <div class="card shadow border-0 h-100">
        <img src="https://source.unsplash.com/random/500x400?{{$post->category->category_name}}" class="card-img-top"
          alt="{{$post->category->category_name}}-img">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h6 class="card-subtitle text-muted">By. <a href="/authors/{{$post->author->username}}"
              class="text-decoration-none">
              {{ $post->author->name }}</a>,
            <a href="/categories/{{ $post->category->category_slug }}" class="text-success text-decoration-none">{{
              $post->category->category_name }}</a> <small class="text-muted d-block">Last updated
              {{$post->updated_at->diffForHumans()}}</small>
            </h5>
            <p class="card-text mt-2">{{ $post->excerpt }}
            </p>
            <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Details</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection