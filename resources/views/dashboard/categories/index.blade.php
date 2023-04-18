@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Categories Editor</h1>
</div>

@if (session('success') && session('success') != '' && session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive justify-content-center mx-auto">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New
    Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category</th>
        <th scope="col">Time Added</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$category->category_name}}</td>
        <td>{{$category->created_at}}</td>
        <td>
          <a href="/dashboard/categories/{{$category->category_slug}}" class="badge bg-info"><span
              data-feather="zoom-in"></span></a>
          <a href="/dashboard/categories/{{$category->category_slug}}/edit" class="badge bg-success"><span
              data-feather="edit"></span></a>
          <form action="/dashboard/categories/{{$category->category_slug}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="badge bg-danger d-inline border-0"
              onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection