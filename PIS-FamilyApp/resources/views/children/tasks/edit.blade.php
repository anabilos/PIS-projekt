@extends('layouts.app2',['name' => Auth::user()->name])

@section('title', 'Dodaj sliku zadatka')

@section('content')

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Dodaj sliku</h1>
            
                
           
        	{!! Form::model($task, ['route' => ['task-image.update', $task->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
			
			@component('components.childTaskForm')
				@endcomponent
			{!! Form::close() !!}
           
           
            <div class="col-sm-4">
                <a href="{{ url('tasks-show/'.$task->child_id) }}" class="btn btn-block btn-light mt-3" >Go Back</a>
            </div>

        

		</div>
	</div>
</div>

@endsection