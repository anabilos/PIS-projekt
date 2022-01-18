@extends('layouts.app3',['name' => Auth::user()->name])

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card " style="height: 300px;" >
                <div class="card-header" style="text-align: center">{{ __('Izaberite korisnika') }}</div>

                <div class="card-body justify-content-center d-flex align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                           
                           <a href="{{ route('parent.password') }}"class="btn btn-custom ">Roditelj</a>
                           
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                          
                            <a href="{{ route('children.index') }}"class="btn btn-light ">Dijete</a>
                           
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
