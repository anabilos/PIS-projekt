@extends('layouts.app2',['name' => Auth::user()->name])


@section('content')

        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <h4 class="card-title">Zadaci</h4>
                        @if(Session::get('success'))
                        <div class="div alert alert-success">
                            {{Session::get('success')}}
                            
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                        @endif
                        @php $br=0; @endphp
                        <ul class="nav nav-pills todo-nav">
                            
                            @foreach ($children as $child)
                            @if($br==0)
                            <li  class="nav-item all-task  mr-1"><a href="{{ route('tasks.show',$child->id) }}"  class="nav-link btn-light "> {{$child->firstName}} {{$child->lastName}} <span class="badge badge-custom badge-pill p-2 " >{{ $child->tasks->count() }}</span> </a></li>
                            @else
                            <li  class="nav-item completed-task mr-1"><a href="{{ route('tasks.show',$child->id) }}"   class="nav-link btn-light ">{{$child->firstName}} {{$child->lastName}} <span class="badge badge-custom badge-pill p-2 " >{{ $child->tasks->count() }}</span>  </a></li>
                            
                            @endif
                            @php $br++;@endphp
                            @endforeach
                             
                        </ul>
                     
                        
                        
                    </div>
                    
                  
                </div>
                </div>
            </div>
        </div>
  
    
@endsection