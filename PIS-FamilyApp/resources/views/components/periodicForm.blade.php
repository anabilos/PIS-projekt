

{{ Form::label('periodic_days', 'Number of days', ['class' => 'control-label mt-3 ']) }}
{{ Form::number('periodic_days', null, $attributes = $errors->has('periodic_days') ? array('placeholder' => 'Periodic days', 'class' => 'form-control is-invalid') : array('placeholder' => 'Periodic days', 'class' => 'form-control')) }}
<div>
@if($errors->has('periodic_days'))
                        <span class="invalid-feedback  d-block" role="alert">
                            <strong>{{ $errors->first('periodic_days') }}</strong>
                        </span>
@endif
</div>



