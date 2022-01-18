@extends('layouts.app2',['name' => Auth::user()->name])


@section('content')

        <div class="row container d-flex justify-content-center">
            <div class="col-md-11">
                <div class="card " >
                    <div class="card-body" >
                        <h4 class="card-title">Zadaci</h4>
                        @if(Session::get('success'))
                        <div class="div alert alert-success">
                            {{Session::get('success')}}
                            
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                        @endif
                      
                        <ul class="nav nav-pills todo-nav mb-4">
                          <li  class="nav-item all-task  mr-1"><a href="{{ route('tasks.show',$id) }}"  class="nav-link btn-light ">All</a></li>
                          <li  class="nav-item active-task mr-1"><a href="{{ route('tasks.show', ['id' => $id,'row' => 'today']) }}"  class="nav-link btn-light">For Today</a></li>
                      </ul>
                      @if ($tasks->count()==0)
                      <div class="list-wrapper" >
                      <ul clas="flex-column-reverse todo-list d-flex">
                      <li class="nav-item todo-nav btn-light p-2 disabled" ><h5 style="text-align: center;">Nema zadataka za prikaz!!</h5></li>
                      </ul>
                    </div>
                      @else
                        <div class="list-wrapper" >
                            <ul>
                            <li class="col-8 ">
                                    
                                <span class="margin:auto"><b>Zadatak</b></span><span style="margin-left: 140px" ><b>Due Date</b></span> 
                           
                           </li>
                        </ul>
                        <ul class=" flex-column-reverse todo-list d-flex ">
                           
                          @foreach($tasks as $task)
                            <li>
                                
                                <span >{{$task->name}}
                                    @if($task->picture!=NULL)
                                    
                                    <i class="fa fa-check-circle-o fa-2x text-success" ></i>
                                    @endif
                                 </span>  <span class="badge badge-custom badge-pill p-2 " style="margin:auto;"  >{{ $task->due_date }} </span>
                                
                                <button href="#"class="btn btn-custom mr-2 ml-2" data-toggle="modal" data-target="#example_{{$task->id}}" >Opširnije</button>
                                <div class="modal fade" id="example_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Zadatak</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          {{$task->description}}
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <a href="{{ route('task-image.edit', $task->id) }}" class="btn btn-custom mr-2">
                                    Dodaj sliku</i></a>
                                    <form action="{{ route('child-task.finished' , $task->id)}}"method="POST">
                                        {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                 
                                <button type="submit"  class="btn btn-custom mr-2">
                                    <i class="fa fa-save "></i>
                                </button>
                            </form>
                                  
                                   
                                  
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