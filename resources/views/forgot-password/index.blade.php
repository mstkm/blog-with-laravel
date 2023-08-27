@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-signin w-100 m-auto">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p class="m-0">{{ session('success') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('emailNotFound'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <p class="m-0">{{ session('emailNotFound') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/forgot-password" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal text-center">We will send link reset password to your email</h1>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus>
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Send Link</button>
        </form>
        <p class="text-center my-3"><a href="/login">Back to Login</a></p>
      </main>
    </div>
  </div>
@endsection
