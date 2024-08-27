@extends('layouts.app')
@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
  <div class="authentication-inner py-4">
    <!-- Login -->
    <div class="card p-2">
      <!-- Logo -->
      <div class="app-brand justify-content-center mt-5">
        <a href="index.html" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <span class="app-brand-logo demo">
              <img scr="assets/img/logo.png" width="30" height="24" />
            </span>
          </span>
          <span class="app-brand-text demo text-heading fw-semibold">Olibh</span>
        </a>
      </div>
      <!-- /Logo -->

      <div class="card-body mt-2">
        <h4 class="mb-2">Welcome to Olibh! 👋</h4>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>

        <form method="POST" id="formAuthentication" class="mb-3" action="{{ route('login') }}">
          @csrf

          <div class="form-floating form-floating-outline mb-3">
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="Enter your email or username"
              autofocus />
            <label for="email">Email or Username</label>
          </div>
          <div class="mb-3">
            <div class="form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <label for="password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
          </div>
          <div class="mb-3 d-flex justify-content-between">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" />
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
            @if (Route::has('password.request'))
            <a class="float-end mb-1" href="{{ route('password.request') }}">
              <span>Forgot Password?</span>
            </a>
            @endif
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
          </div>
        </form>

        <p class="text-center">
          <span>New on our platform?</span>
          <a href="{{ route('register') }}">
            <span>Create an account</span>
          </a>
        </p>
      </div>
    </div>
    <!-- /Login -->
    <img
      src="{{asset('assets/img/illustrations/tree-3.png')}}"
      alt="auth-tree"
      class="authentication-image-object-left d-none d-lg-block" />
    <img
      src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}"
      class="authentication-image d-none d-lg-block"
      alt="triangle-bg"
      data-app-light-img="{{asset('illustrations/auth-basic-mask-light.png')}}"
      data-app-dark-img="{{asset('illustrations/auth-basic-mask-dark.png')}}" />
    <img
      src="{{asset('assets/img/illustrations/tree.png')}}"
      alt="auth-tree"
      class="authentication-image-object-right d-none d-lg-block" />
  </div>
</div>
@endsection