@extends('layouts.app1',['name' => Auth::user()->name])

@section('title', 'Uredi Namirnicu')

@section('content')

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center ">
		<div class="col-sm-8">
			<h1 class="pb-4">Uredi Namirnicu</h1>
			{!! Form::model($item, ['route' => ['item.update', $item->id], 'method' => 'PUT']) !!}
				@component('components.itemForm')
				@endcomponent
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection