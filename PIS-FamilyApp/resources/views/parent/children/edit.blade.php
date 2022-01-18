@extends('layouts.app1',['name' => Auth::user()->name])

@section('title', 'Uredi Dijete')

@section('content')


<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Uredi Dijete</h1>
			{!! Form::model($child, ['route' => ['child.update', $child->id], 'method' => 'PUT']) !!}
				@component('components.childForm')
				@endcomponent
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection