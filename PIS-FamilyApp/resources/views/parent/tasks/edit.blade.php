@extends('layouts.app1',['name' => Auth::user()->name])

@section('title', 'Uredi Zadatak')

@section('content')
<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Uredi Zadatak</h1>
			{!! Form::model($task, ['route' => ['taskk.update', $task->id,'type'=>$type], 'method' => 'PUT']) !!}
				@component('components.taskForm')
				@endcomponent
				
				<label for="child" class="control-label mt-3 ">Child:</label>
				<select  name="child" id="child" aria-label="Example">
					@foreach($user->children as $child)
					@if($child->id==$task->child_id)
					<option value="{{$child->id}}" selected>{{$child->firstName}} {{$child->lastName}}</option>
					@else
				   <option value="{{$child->id}}">{{$child->firstName}} {{$child->lastName}}</option>
				   	@endif
					 @endforeach
				</select>
				   
				   <div class="row justify-content-center mt-5">
					<div class="col-sm-4">
						<a href="{{ route('task.index',['type'=>$type]) }}"  class="btn btn-block btn-light " >Go Back</a>
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