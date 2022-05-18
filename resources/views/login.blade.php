@extends('layouts.loginlayout')
@section('title','Login Admin')

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">{{ __('Login') }}
            <div class="brand-logo">
              <img src="{{asset('template')}}/images/kemkominfo.png" alt="logo">
            </div>
            <h4>Hello! Admin E-Kepegawaian</h4>
            <h6 class="fw-light">Log in to continue.</h6>
            @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </div>
            @endif
            <form class="pt-3" action="/admin/login" method="POST">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">{{ __('Password') }}
                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>