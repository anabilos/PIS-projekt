@extends('layouts.app1',['name' => Auth::user()->name])


@section('content')

        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <h1 class="card-title">Groceries list</h1>
                                            @if(Session::get('success'))
                    <div class="div alert alert-success">
                    {{Session::get('success')}}
                    
                    @php
                        Session::forget('success')
                    @endphp
                    </div>
                    @endif
                        <div class="add-items d-flex pb-3"> <a  href="{{ route('item.create') }}"  class=" btn btn-custom font-weight-bold ">Add item</a> </div>
                        <ul class="nav nav-pills todo-nav">
                            <li  class="nav-item all-task mr-1"><a href="{{ route('item.index') }}"  class="nav-link btn-light ">All</a></li>
                            <li  class="nav-item active-task"><a href="{{ route('item.index', ['sort' => 'high_low']) }}" class="nav-link btn-light">Sort by name</a></li>
                            
                        </ul>
                        <div class="list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                                @foreach($groceries as $item)
                                    
                                
                                <li>
                                    <div class="form-check"style="width:200px;> <label class="form-check-label"> <input class="checkbox" type="checkbox">   {{$item->name}}<i class="input-helper"></i></label> </div> <span class="badge badge-custom badge-pill p-2 "style=" margin:auto" >{{$item->quantity}}</span> 
                                    <div class="d-flex">
                                        
                                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-custom mr-2"><i class="fa fa-pencil-square-o  " ></i></a>
                                        <form action="{{ route('item.destroy' , $item->id)}}" method="POST">
                                          <input name="_method" type="hidden" value="DELETE">
                                          {{ csrf_field() }}
                                           <button type="submit" class="btn btn-custom">
                                            <i class="fa fa-times "></i>
                                           </button>
                                             </form>
                                        
                                        </div> 
                                </li>
                               
                            
                                @endforeach
                            
                            </ul>
                        </div>
                        <div class="main-navigation "style="margin-top:40px; float:right;" >
                            {{$groceries->appends(request()->input())->links("pagination::bootstrap-4")}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
  
    
@endsection