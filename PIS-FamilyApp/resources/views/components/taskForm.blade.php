{{ Form::label('name', 'Task Name', ['class' => 'control-label pt-4']) }}
{{ Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Name', 'class' => 'form-control is-invalid') : array('placeholder' => 'Name', 'class' => 'form-control')) }}

<div >

@if($errors->has('name'))

                        <span class="invalid-feedback  d-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
@endif
</div>

{{ Form::label('description', 'Task Description', ['class' => 'control-label mt-3 ']) }}
{{ Form::textarea('description', null, $attributes = $errors->has('description') ? array('placeholder' => 'Description', 'class' => 'form-control is-invalid') : array('placeholder' => 'Description', 'class' => 'form-control')) }}
<div>
@if($errors->has('description'))
                        <span class="invalid-feedback  d-block" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
@endif
</div>

{{ Form::label('due_date', 'Due Date', ['class' => 'control-label mt-3 ']) }}
{{ Form::date('due_date', null, $attributes = $errors->has('due_date') ? array('placeholder' => 'Due Date', 'class' => 'form-control is-invalid') : array('placeholder' => 'Due Date', 'class' => 'form-control')) }}
<div>
@if($errors->has('due_date'))
						
                        <span class="invalid-feedback  d-block" role="alert" >
                            <strong>{{ $errors->first('due_date') }}</strong>
                        </span>
@endif
</div>


