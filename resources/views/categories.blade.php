@extends('./layouts/main')

@section('container')
<div class="container">
  <h1 class="mb-5">Halaman Category</h1>

  <div class="row">
    @foreach ($categories as $category)
    <h4><a href="/categories/{{$category->category_slug}}" class="text-warning">{{$category->category_name}}</a></h4>
    @endforeach
  </div>
</div>
@endsection