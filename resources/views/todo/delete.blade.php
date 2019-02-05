Are you sure you want to delete ? 
<div class="card">
	<div class="card-body">
		{{ucfirst($todo->name)}}
	</div>
</div>
{{Form::open(['method'=>'DELETE', 'action'=>['TodoController@destroy', $todo->id], 'class'=>'ajax-form-delete'])}}
<div class="form-group">
	
	<div class="ml-auto float-right">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	{{ Form::submit('Delete',  ['class'=>'btn btn-primary'])}}
	</div>
</div>
{{Form::close()}}