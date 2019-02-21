<div class="form-options">
	<div class="col-lg-6 form-group input-group mb-3" style="display: none;">
	  {{Form::text('option_name[]', null, ['class'=>'form-control'])}}
	  <div class="input-group-append">
	    <span class="input-group-text btn btn-danger" id="basic-addon2">Delete</span>
	  </div>
	</div>

	
</div>

{{Form::open(['method'=>'POST', 
	'action'=>['SurveyQuestionsController@store', $survey->id],

	])}}
	<div class="form-group">
		{{Form::label('section', 'Section')}}
		{{Form::select('section',['1'=>'attitude', '2'=>'PD'], null,['class'=>'form-control'])}}
		<span class="error-message"></span>
	</div>

	<div class="form-group">
		{{Form::label('question_name', 'Question')}}
		{{Form::textarea('question_name', null, ['class'=>'form-control', 'rows'=>3])}}
		<span class="error-message"></span>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				{{Form::label('sort_id', 'Sort number')}}
				{{Form::number('sort_id',null, ['class'=>'form-control'])}}
				<span class="error-message"></span>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				{{Form::label('type', 'Type')}}
				{{Form::select('type',[''=>'Choose..','radio'=>'radio', 'checkbox'=>'checkbox', 'textarea'=>'textarea'],null, ['class'=>'form-control'])}}
				<span class="error-message"></span>
			</div>
		</div>
	</div>

	<div class="btn btn-primary btn-sm mb-2 add-options-btn" style="display: none;">Add Options</div>

	
	{{-- radio and checkbox field --}}
	<div class="row options-field " style="display: none;">
		<div class="col-lg-12 border-bottom mb-2"><b>Options</b></div>
		
	</div>

	<div class="form-group">
		{{Form::submit('Create', ['class'=>'btn btn-primary'])}}
	</div>
	{{Form::close()}}
	
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script type="text/javascript">
		$(function(){
			var counter = 0;
			// show add option button
			$('#type').on('click', function(){
				var type = $(this).val();
				console.log(type);
				if((type =="radio") || (type =="checkbox")){
					$('.add-options-btn').show();
				}

				if(type =="textarea"){
					$('.add-options-btn').hide();
					$('.options-field .form-group').remove();
					counter = 0;
				}
			});

			// limit the options to 10
			$('.add-options-btn').on('click', function(){
				if( counter < 10){
					$('.options-field').show();
					$('.form-options .form-group').clone().appendTo('.options-field').show();
					counter++;
				}
			});


			// Remeove options field
			$('.options-field').on('click','.btn-danger', function(){
				$(this).parent().parent('div').remove();
				counter --;
			});
		
		});
	</script>