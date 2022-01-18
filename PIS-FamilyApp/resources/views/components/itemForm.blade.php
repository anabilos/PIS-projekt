{{ Form::label('name', 'Item Name', ['class' => 'control-label pt-4']) }}
{{ Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Name', 'class' => 'form-control is-invalid ') : array('placeholder' => 'Name', 'class' => 'form-control')) }}
<div>
	@if($errors->has('name'))
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
	@endif
	</div>

	{{ Form::label('quantity', 'Quantity Name', ['class' => 'control-label pt-4']) }}
	{{ Form::text('quantity', null, $attributes = $errors->has('quantity') ? array('placeholder' => 'Quantity', 'class' => 'form-control is-invalid ') : array('placeholder' => 'Quantity', 'class' => 'form-control')) }}
	
	<div >
	
	@if($errors->has('quantity'))
	
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('quantity') }}</strong>
							</span>
	@endif
	</div>



	<div class="row justify-content-center mt-5">
		<div class="col-sm-4">
			<a href="{{ route('item.index') }}" class="btn btn-block btn-light " >Go Back</a>
		</div>
		<div class="col-sm-4">
			<button class="btn btn-block btn-custom " type="submit">Save Item</button>
		</div>
	</div>