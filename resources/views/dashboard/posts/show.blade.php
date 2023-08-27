@extends('dashboard.layouts.main')

@section('container')
  <div class="mt-3 mb-5">
    <h1 class="mb-3">{{ $post->title }}</h1>

    <a href="/dashboard/posts" class="btn btn-sm btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>
    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle" class="align-text-bottom"></span> Delete</button>
    </form>

    @if($post->image)
    <div style="max-height: 350px; overflow: hidden;">
      <img src="{{ asset('storage/' . $post->image); }}" class="card-img-top img-fluid mt-3" alt="$post->image">
    </div>
    @else
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid mt-3" alt="$post->title">
    @endif

    <article class="my-3">
      {!! $post->body !!}
    </article>
  </div>
@endsection
