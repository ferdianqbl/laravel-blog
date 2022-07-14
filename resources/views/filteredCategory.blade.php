@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5">Halaman <span class="text-success">{{$category->category_name}}</span> Category</h1>

  <div class="row">
    @if (sizeof($category->blogs) === 0)
    <h5 class="text-warning">Tidak Ada Blog di kategori ini</h5>
    @else
    @foreach ($category->blogs as $post)
    <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h5 class="card-subtitle text-muted">{{ $post->user->name }}</h5>
          <p class="card-text">{{ $post->excerpt }}
          </p>
          <a href="/blog/{{ $post->slug}}" class="btn btn-primary">Details</a>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection