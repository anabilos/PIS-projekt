{{ Form::label('First Name', 'First Name', ['class' => 'control-label ']) }}
{{ Form::text('firstName', null, $attributes = $errors->has('firstName') ? array('placeholder' => 'First Name', 'class' => 'form-control is-invalid') : array('placeholder' => 'First Name', 'class' => 'form-control')) }}
<div>
@if($errors->has('firstName'))
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('firstName') }}</strong>
							</span>
	@endif
</div>	
{{ Form::label('Last Name', 'Last Name', ['class' => 'control-label pt-4']) }}
{{ Form::text('lastName', null, $attributes = $errors->has('lastName') ? array('placeholder' => 'Last Name', 'class' => 'form-control is-invalid') : array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
<div>
@if($errors->has('lastName'))
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('lastName') }}</strong>
							</span>
	@endif
</div>	
{{ Form::label('age', 'Age', ['class' => 'control-label mt-3 ']) }}
{{ Form::number('age', null, $attributes = $errors->has('age') ? array('placeholder' => 'Age', 'class' => 'form-control is-invalid') : array('placeholder' => 'Age', 'class' => 'form-control')) }}
<div>
@if($errors->has('age'))
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('age') }}</strong>
							</span>
	@endif
</div>
{{ Form::label('education', 'Education', ['class' => 'control-label mt-3 ']) }}
{{ Form::textarea('education', null, $attributes = $errors->has('education') ? array('placeholder' => 'Education', 'class' => 'form-control is-invalid') : array('placeholder' => 'Education', 'class' => 'form-control')) }}
<div>
@if($errors->has('education'))
							<span class="invalid-feedback  d-block" role="alert">
								<strong>{{ $errors->first('education') }}</strong>
							</span>
	@endif


</div>
<div class="row justify-content-center mt-5">
	<div class="col-sm-4">
		<a href="{{ route('child.index') }}" class="btn btn-block btn-light " >Go Back</a>
	</div>
	<div class="col-sm-4">
		<button class="btn btn-block btn-custom " type="submit">Save Child</button>
	</div>
</div>