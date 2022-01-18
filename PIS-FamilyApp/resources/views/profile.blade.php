@extends('layouts.app1')


@section('content')

       
                     
                        
                        <div class="list-wrapper">
                            <ul>
                            <li class="col-8">     
                             <span class="mt-2"><b>Zadatak</b></span> <label class="form-check-label" style="margin:auto"><b>Opsirnije</b></label>  <span><b>Due Date</b></span> 
                           
                           </li>
                             </ul>
                            <ul class="d-flex flex-column-reverse todo-list">
                                @foreach ($tasks as $task)
                                <li>
                                    <div class="form-check" style="width:150px;"> <label class="form-check-label"> <input class="checkbox" type="checkbox">{{$task->name}}<i class="input-helper"></i></label> </div> <div style=" margin:auto; width:170px" >{{$task->description}}</div> <span class="badge badge-custom badge-pill p-2 mt-2"style=" margin:auto; margin-right:100px" >{{$task->due_date}}</span> 
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-custom mr-2" style="height:40px"><i class="fa fa-plus pr-2"></i>File</a>
                                           <button type="submit" class="btn btn-custom" style="height:40px">
                                            <i class="fa fa-times "></i>
                                           </button>
                                        </div> 
                                </li>
                                    
                                @endforeach
                             
                            </ul>
                            
                           
                        </div>
      
  
    
@endsection