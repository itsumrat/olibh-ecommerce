@extends('layouts.app')
@section('content')

<div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Logo -->
          <div class="card p-2">
            <!-- Forgot Password -->
            <div class="app-brand justify-content-center mt-5">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img scr="assets/img/logo.png" width="30" height="24">
                </span>
                <span class="app-brand-text demo text-heading fw-semibold">Olibh</span>
              </a>
            </div>
            <!-- /Logo -->
            <div class="card-body mt-2">
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <form  id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
              @csrf
                <div class="form-floating form-floating-outline mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus />
                  <label>Email</label>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
                <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
              </form>
              <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
          <img
            src="assets/img/illustrations/tree-3.png"
            alt="auth-tree"
            class="authentication-image-object-left d-none d-lg-block" />
          <img
            src="assets/img/illustrations/auth-basic-mask-light.png"
            class="authentication-image d-none d-lg-block"
            alt="triangle-bg"
            data-app-light-img="illustrations/auth-basic-mask-light.png"
            data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
          <img
            src="assets/img/illustrations/tree.png"
            alt="auth-tree"
            class="authentication-image-object-right d-none d-lg-block" />
        </div>
      </div>
@endsection