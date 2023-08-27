@extends('layouts.main')

@section('container')
  <h1>Categories </h1>

  <div class="container row my-4 p-0">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-3">
      <a href="/posts?category={{ $category->slug }}">
      <div class="card text-bg-dark">
        <img src="https://source.unsplash.com/300x300?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
        <div class="card-img-overlay p-0 d-flex align-items-center justify-content-center">
          <h5 class="card-title flex-fill text-center py-3" style="background-color: rgba(0, 0, 0, 0.7);">{{ $category->name }}</h5>
        </div>
      </div>
      </a>
    </div>
    @endforeach
  </div>
@endsection
