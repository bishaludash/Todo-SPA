<?php

namespace App\Http\Controllers;

use App\QuestionOption;
use App\Survey;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey)
    {
        return view('survey.questions.create', compact('survey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Survey $survey)
    {   
        // return $request->only('option_name');
        $rules = [
            'question_name'=>'required',
            'section'=>'required',
            'sort_id'=>'required',
            'type'=>'required'
        ];
        $input = $request->except('option_name');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return[
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray(),
            ];
        }
       
       // other fields
        $input['is_active']='1';
        $question = $survey->questions()->create($input);

        // options
        if ($input['type'] == "radio" || $input['type'] == "checkbox") {
            if ($request->option_name) {
               foreach ($request->option_name as $option) {
                QuestionOption::create([
                    'question_id'=>$question->id,
                    'option_name'=>$option,
                    'is_active'=>'1'
                ]);
                } 
            }
            
        }


        
        return back();
        // return [
        //     'status'=>'success',
        //     'return_url'=>route('survey.show', $survey->id),
        //     'message'=>'Successfully created'
        // ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestion $surveyQuestion)
    {
        //
    }
}
