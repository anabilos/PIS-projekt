@extends('layouts.app1',['name' => Auth::user()->name])


@section('content')

        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <h4 class="card-title">Todo List for kids</h4>
                        @if(Session::get('success'))
                        <div class="div alert alert-success">
                            {{Session::get('success')}}
                            
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-4"><a href="{{ route('task.create',['type'=> $type]) }}"   class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="fa fa-plus pr-2"></i>Dodaj novi zadatak</a></div>
                            <!-- end col -->
                        </div>
                        <ul class="nav nav-pills todo-nav">
                            <li  class="nav-item all-task  mr-1"><a href="{{route('task.index',['type' => $type])}}" class="nav-link btn-light ">All</a></li>
                            <li  class="nav-item active-task mr-1"><a href="{{ route('task.index', ['row' => 'active_'.$type]) }}"  class="nav-link btn-light">Active</a></li>
                            <li  class="nav-item completed-task"><a href="{{ route('task.index', ['row' => 'completed_'.$type]) }}" class="nav-link btn-light">Completed</a></li>
                        </ul>
                        @if ($tasks->count()==0)
                        <div class="list-wrapper" >
                        <ul clas="flex-column-reverse todo-list d-flex">
                        <li class="nav-item todo-nav btn-light p-2 disabled" ><h5 style="text-align: center;">Nema zadataka za prikaz!!</h5></li>
                        </ul>
                      </div>
                        @else
                        <div class="list-wrapper">
                            <ul>
                               
                            <li class="col-8">
                                @if ($comp==1&&$type=='periodic')
                                <span class="mt-2"><b>Dijete</b></span> <label class="form-check-label" style="margin:auto"><b>Zadatak</b></label>  <span class="mr-5"><b>Due Date</b></span> 
                                 
                                 @else
                                <span class="mt-2"><b>Dijete</b></span> <label class="form-check-label" style="margin:auto"><b>Zadatak</b></label>  <span><b>Due Date</b></span> 
                                @endif
                                
                           </li>
                        </ul>
                            <ul class="d-flex flex-column-reverse todo-list">
                                
                                @foreach($tasks as $task)
                                <li>
                                    
                                    <span class="mt-2">{{$task->child->firstName}} {{$task->child->lastName}}</span> <label style="margin:auto">@if ($comp==1){{ $task->name }}<i class="fa fa-check-circle-o fa-2x text-success" ></i>@else{{ $task->name }}@endif</label>  <span class="badge badge-custom badge-pill p-2 ml-1"style=" margin:auto;"  >{{ $task->due_date }}</span> 
                                   <div class="d-flex">
                                       @if ($comp==1)
                                      
                                       <button href="#"class="btn btn-custom mr-2 ml-2" data-toggle="modal" data-target="#example_{{$task->id}}" ><i class="fa fa-photo "></i></button>
                                
                                                        <form action="{{ route('task.repeat', $task->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                    
                                                    <button type="submit"  class="btn btn-custom mr-2">
                                                        <i class="fa fa-undo "></i>
                                                    </button>
                                                </form>
                                                @if($type=='periodic')
                                                <a href="{{ route('task.refresh', $task->id) }}"  class="btn btn-custom mr-2" ><i class="fa fa-refresh"></i></a>
                                                @endif
                                               
                                               
                                               
                                            <div class="modal fade" id="example_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Zadatak</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: center">
                                                        <img height="200px" src="{{asset('images/'. $task->picture)}}" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                          
                                       
                                       @else
                                       @if($edit==1)
                                       <a href="{{ route('taskk.edit', ['id'=>$task->id,'type'=>$type]) }}"class="btn btn-custom mr-2"><i class="fa fa-pencil-square-o  " ></i></a>
                                       @endif
                                       @endif
                                       <form action="{{ route('task.destroy' , $task->id)}}" method="POST">
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
                        @endif
                        <div class="main-navigation "style="margin-top:40px; float:right;" >
                            {{$tasks->appends(request()->input())->links("pagination::bootstrap-4")}}
                            </div>
                      
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
  
    
@endsection