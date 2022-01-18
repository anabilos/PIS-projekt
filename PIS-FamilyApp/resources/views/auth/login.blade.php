
@extends('layouts.app')

@section('content')
  
  
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('assets/images/family_photo.jpg') }}" alt="Image" class="img-thumbnail">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8 mt-5">
            <div class="mb-4">
              <h3 class="text-center">Prijavi se</h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="form-group first">
              <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail') }}</label>
              
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
            
          <div class="form-group last mb-4">
            <label for="password" class="col-md-4 col-form-label ">{{ __('Lozinka') }}</label>

            
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>
        <div class="d-flex mb-5 align-items-center">

                  <label class="control control--checkbox mb-0 mr-3" for="remember">
                    <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      {{ __('Zapamti me') }}
                  
                  
                  <div class="control__indicator"></div>
                  </label>
                  @if (Route::has('password.request'))
                  <span class="ml-auto"><a class="forgot-pass" href="{{ route('password.request') }}">
                      {{ __('Zaboravili ste lozinku?') }}
                    </a></span> 
              @endif
      </div>
      <button type="submit" class="btn btn-block btn-primary">
        {{ __('Prijavite se') }}
     </button>

           

              
              
             
              </div>
            </form>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>

  
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    
    @endsection