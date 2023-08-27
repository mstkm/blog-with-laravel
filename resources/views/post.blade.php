@extends('layouts.main')

@section('container')
  <div>
    <h1>{{ $post->title }}</h1>
    <p>By <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    @if($post->image)
    <div style="max-height: 500px; overflow: hidden;">
      <img src="{{ asset('storage/' . $post->image); }}" class="card-img-top img-fluid" alt="$post->title">
    </div>
    @else
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid" alt="$post->title">
    @endif

    <article class="my-3">
      {!! $post->body !!}
    </article>
    <div class="my-4">
      <a href="/posts">Back to Posts</a>
    </div>
  </div>
@endsection
