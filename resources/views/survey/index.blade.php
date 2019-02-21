<h1>Survey</h1>

{{ Form::open(['method'=>'POST', 'action'=>'SurveyController@store'])}}
		{{ Form::label('survey_name', 'Name')}}
		{{ Form::text('survey_name', null)}}

		{{ Form::submit('submit')}}
{{ Form::close()}}


@foreach ($surveys as $survey)
	<li><a href="{{ route('survey.show', $survey->id) }}">{{$survey->survey_name}}</a></li>
@endforeach