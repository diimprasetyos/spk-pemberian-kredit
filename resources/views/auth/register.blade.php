@extends('layouts.master-login')

@section('content')
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Register to continue.</h6>
              <form method="POST" action="{{ route('register') }}" class="pt-3">
               @csrf
               <div class="form-group">
                <label for="name" class="font-weight-light">{{ __('Name') }}</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
                <div class="form-group">
                  <label for="email" class="font-weight-light">{{ __('Email Address') }}</label>
                  <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="password" class="font-weight-light">{{ __('Password') }}</label>
                  <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="font-weight-light">{{ __('Password') }}</label>
                    <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{'REGISTER'}}</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="{{route ('login')}}" class="text-primary">Login</a>
                </div>
              </form>
@endsection