@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="card border-0">
      <div class="card-body">
        <h1 class="card-title text-center mb-3">{{ $post->title }}</h1>

        <a href="/dashboard/posts" class="btn btn-info"><span data-feather="arrow-left"></span> Back to my posts</a>
        <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-success"><span data-feather="edit"></span>
          Edit</a>
        <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span>
            Delete</button>
        </form>

        @if ($post->image)
        {{-- <img src="/storage/{{$post->image}}" alt="{{$post->title}}" class="card-img-top img-fluid my-3 rounded">
        --}}
        <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}"
          class="card-img-top img-fluid my-3 rounded">
        @else
        <img src="https://source.unsplash.com/random/1200x400?{{$post->category->category_name}}"
          class="card-img-top img-fluid my-3 rounded" alt="{{$post->category->category_name}}-img">
        @endif


        <p class="card-text">{!!$post->body!!}
        </p>
      </div>
    </div>
  </div>
</div>
</div>
@endsection