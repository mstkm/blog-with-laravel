@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-registration w-100 m-auto">
        <form action="/register" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

          <div class="form-floating">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" style="border-top-right-radius: 0; border-top-left-radius: 0;" value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
        <p class="text-center my-3">Already have an account? <a href="/login">Login Now!</a></p>
      </main>
    </div>
  </div>
@endsection

@section('container')
  <h1>Halaman Register</h1>
@endsection
