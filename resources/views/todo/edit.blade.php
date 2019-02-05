{{Form::model($todo, ['method'=>'PUT', 'action'=>['TodoController@update', $todo->id], 'class'=>'ajax-form-post'])}}
	@include('todo.form')

	<div class="form-group">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	{{ Form::submit('Save',  ['class'=>'btn btn-primary'])}}
	</div>
{{Form::close()}}