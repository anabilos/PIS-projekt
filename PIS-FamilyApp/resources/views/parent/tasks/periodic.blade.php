@extends('layouts.app1',['name' => Auth::user()->name])

@section('title', 'Postavi Zadatak')

@section('content')

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Postavi Zadatak</h1>
			{!! Form::model($task, ['route' => ['task.refreshp', $task->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
			
			@component('components.periodicForm')
				@endcomponent
			

				
				   
				   <div class="row justify-content-center mt-5">
					<div class="col-sm-4">
						<a href="{{ route('task.index',['type'=>'periodic']) }}" class="btn btn-block btn-light " >Go Back</a>
					</div>
					<div class="col-sm-4">
						<button class="btn btn-block btn-custom " type="submit">Save Task</button>
					</div>
				</div>
                {!! Form::close() !!}
		</div>
	</div>
</div>

@endsection