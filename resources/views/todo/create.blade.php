{{Form::open(['method'=>'post', 'action'=>'TodoController@store', 'class'=>'ajax-form-post'])}}
	@include('todo.form')

	<div class="ml-auto float-right">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	{{ Form::submit('Submit',  ['class'=>'btn btn-primary'])}}
	</div>
{{Form::close()}}