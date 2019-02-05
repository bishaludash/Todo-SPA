<div class="form-group">
	{{ Form::label('name', 'Name')}}
	{{ Form::text('name', null, ['class'=>'form-control'])}}
	<span class="error-message"></span>
</div>

<div class="form-group">
	{{ Form::label('description', 'Description')}}
	{{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>4])}}
	<span class="error-message"></span>
</div>

