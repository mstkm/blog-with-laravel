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
        <form action="/reset-password" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>
          <div class="form-floating">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="New password" autofocus>
            <label for="password">New Password</label>
            @error('password')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm password">
            <label for="password_confirmation">Confirm Password</label>
            @error('password_confirmation')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
            @enderror
          </div>
          <input type="text" name="token" value="{{ $token }}" class="d-none"/>
          <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Reset Password</button>
        </form>
      </main>
    </div>
  </div>
@endsection
