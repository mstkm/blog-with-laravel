@extends('layouts.main')

@section('container')
  <div class="d-flex align-items-center justify-content-between mb-5">
    <h1>{{ $title }}</h1>

    <div class="row">
      <form action="/posts">
        <div class="input-group">
          @if (request('category'))
          <input name="category" type="hidden" class="form-control shadow-none border-dark" placeholder="Search..." value="{{ request('category') }}">
          @endif
          @if (request('author'))
          <input name="author" type="hidden" class="form-control shadow-none border-dark" placeholder="Search..." value="{{ request('author') }}">
          @endif
          <input name="search" type="text" class="form-control rounded-start shadow-none border-dark" placeholder="Search..." value="{{ request('search') }}">
          <button class="btn btn-outline-dark" type="submit">
            <i class="bi-search"></i>
          </button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
  <div class="card mb-3">
    @if($posts[0]->image)
    <div style="max-height: 400px; overflow: hidden;">
      <img src="{{ 'storage/' . $posts[0]->image }}" class="card-img-top img-fluid" alt="{{ $posts[0]->image }}">
    </div>
    @else
      <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top img-fluid" alt="image">
    @endif
    <div class="card-body">
    <h1>
      <a class="text-black text-decoration-none" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
    </h1>
      <p>
        <small class="text-muted">By <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/posts/{{ $posts[0]->slug }}">Read More...</a>
    </div>
  </div>

  <div class="container p-0">
    <div class="row">
    @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-4">
        <div class="card">
          <a href="/posts?category={{ $post->category->slug }}">
            <div class="position-absolute text-white px-3 py-1" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 4px 0 0 0">{{ $post->category->name }}</div>
          </a>
          @if($post->image)
            <img src="{{ asset('storage/' . $post->image); }}" class="card-img-top img-fluid" alt="{{ $post->image }}">
          @else
            <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" class="card-img-top" alt="...">
          @endif
          <div class="card-body">
            <h5 class="card-title">
              <a class="text-black text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h5>
            <p>
              <small class="text-muted">By <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
              </small>
            </p>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}">Read More...</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  @else
    <p class="text-center fs-4">No Posts Found.</p>
  @endif
  <div class="d-flex justify-content-center my-4">
    {{ $posts->onEachSide(0)->links() }}
  </div>
@endsection
