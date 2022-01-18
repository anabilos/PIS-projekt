
@extends('layouts.app3',['name' => Auth::user()->name])

@section('content')
  
  
    <div class="container h-100 mt-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 align-self-center">
          <div class="row justify-content-center">
            <div class="col-md-8">
           
              @if(Session::get('success'))
                        <div class="div alert alert-success">
                            {{Session::get('success')}}
                            
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                        @endif
              <div class="mb-4 ">
              <h3 class="text-center">Prijavi se</h3>
            </div>
            <form method="POST" action="{{ route('parent.login') }}">
              @csrf
                
            
          <div class="form-group last mb-4">
            <label for="parent_password" class="col-md-4 col-form-label ">{{ __('Lozinka') }}</label>

            
                <input id="parent_password" type="password" class="form-control @error('parent_password') is-invalid @enderror" name="parent_password" value="{{ old('parent_password') }}" required autocomplete="parent_password" autofocus>

                @error('parent_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>
     
      <button type="submit" class="btn btn-block btn-custom">
        {{ __('Prijavite se') }}
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
    <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';
      if(exist){
        alert(msg);
      }
    </script>
    @endsection