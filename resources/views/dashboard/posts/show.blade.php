@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="card border-0">
      <div class="card-body">
        <h1 class="card-title text-center mb-3">{{ $post->title }}</h1>

        <a href="/dashboard/posts" class="btn btn-info"><span data-feather="arrow-left"></span> Back to my posts</a>
        <a href="" class="btn btn-success"><span data-feather="edit"></span> Edit</a>
        <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Delete</a>

        <img src="https://source.unsplash.com/random/1200x400?{{$post->category->category_name}}"
          class="card-img-top img-fluid my-3 rounded" alt="{{$post->category->category_name}}-img">
        <p class="card-text">{!!$post->body!!}
        </p>
      </div>
    </div>
  </div>
</div>
</div>
@endsection