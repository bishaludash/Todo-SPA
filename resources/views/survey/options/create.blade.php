
{{Form::open(['method'=>'POST', 
			'action'=>['QuestionOptionsController@store', $question->id],
			
			])}}
	<div class="form-group">
		{{Form::label('option_name', 'Option')}}
		{{Form::textarea('option_name', null, ['class'=>'form-control', 'rows'=>3])}}
		<span class="error-message"></span>
	</div>


	<div class="form-group">
		{{Form::submit('Create', ['class'=>'btn btn-primary'])}}
	</div>
{{Form::close()}}