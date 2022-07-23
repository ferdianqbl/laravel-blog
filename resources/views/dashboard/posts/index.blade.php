@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Posts Editor</h1>
</div>

@if (session('success') && session('success') != '' && session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive justify-content-center mx-auto">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Time Added</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->category->category_name}}</td>
        <td>{{$post->created_at}}</td>
        <td>
          <a href="/dashboard/posts/{{$post->slug}}" class="badge bg-info"><span data-feather="zoom-in"></span></a>
          <a href="" class="badge bg-success"><span data-feather="edit"></span></a>
          <a href="" class="badge bg-danger"><span data-feather="trash-2"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection