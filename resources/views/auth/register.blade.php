@extends('layouts.app')
@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
        <!-- Register Card -->
        <div class="card p-2">
            <!-- Logo -->
            <div class="app-brand justify-content-center mt-5">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img scr="{{asset('assets/img/logo.png')}}" width="30" height="24" />
                    </span>
                    <span class="app-brand-text demo text-heading fw-semibold">Materio</span>
                </a>
            </div>
            <!-- /Logo -->
            <div class="card-body mt-2">
                <h4 class="mb-2">Adventure starts here 🚀</h4>
                <p class="mb-4">Make your app management easy and fun!</p>
                <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-floating form-floating-outline mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            required autofocus autocomplete="name"  />
                        <label for="name">name</label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required autocomplete="username" />
                        <label for="email">Email</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    aria-describedby="password" required autocomplete="new-password"  />
                                <label for="password">Password</label>

                            </div>
                            <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    name="password_confirmation"
                                    aria-describedby="password" required autocomplete="new-password"  />
                                <label for="password_confirmation">Confirm Password</label>

                            </div>
                            <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                            <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Sign up</button>
                </form>

                <p class="text-center">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}">
                        <span>Sign in instead</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- Register Card -->
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