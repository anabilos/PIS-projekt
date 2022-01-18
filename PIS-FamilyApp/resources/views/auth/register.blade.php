@extends('layouts.app')

@section('content')
  
  
    <div class="container h-100  pt-4" >
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 align-self-center">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-2 ">
              <h3 class="text-center">Registrirajte se</h3>
            </div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group first">
                  
                <label for="name" class="col-md-8 col-form-label ">{{ __('Naziv') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
  
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
            </div>
                    

            <div class="form-group first">
                <label for="email" class="col-md-8 col-form-label ">{{ __('E-Mail') }}</label>
                
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
  
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group last mb-4">
                <label for="password" class="col-md-8 col-form-label ">{{ __('Lozinka') }}</label>
    
                
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>
            <div class="form-group last mb-4">
                <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Potvrdna lozinka') }}</label>
    
                
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                
            </div>


            <div class="form-group last mb-4">
                <label for="parent_password" class="col-md-8 col-form-label ">{{ __('Roditeljska lozinka') }}</label>
    
                
                <input id="parent_password" type="password" class="form-control @error('parent_password') is-invalid @enderror" name="parent_password" value="{{ old('parent_password') }}" required autocomplete="parent_password" autofocus>
    
                    @error('parent_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>
            <div class="form-group last mb-4">
                <label for="parent_password-confirm" class="col-md-8 col-form-label ">{{ __('Potvrdna roditeljska lozinka') }}</label>
    
                
                    <input id="parent_password-confirm" type="password" class="form-control" name="parent_password_confirmation" required autocomplete="new-password">
                
            </div>

                      

                        
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Registrirajte se') }}
                                 </button>
       
                              </form>
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
