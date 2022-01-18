@extends('layouts.app1',['name' => Auth::user()->name])

@section('title', 'Dodaj namirnicu')

@section('content')

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Dodaj namirnicu
            </h1>
			{!! Form::open(['route' => 'item.store', 'method' => 'POST']) !!}
				@component('components.itemForm')
				@endcomponent
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection