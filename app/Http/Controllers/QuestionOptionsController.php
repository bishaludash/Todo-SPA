<?php

namespace App\Http\Controllers;

use App\QuestionOption;
use App\SurveyQuestion;
use Illuminate\Http\Request;

class QuestionOptionsController extends Controller
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
    public function create(SurveyQuestion $question)
    {   
        return view('survey.options.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SurveyQuestion $question)
    {
        $input = $request->all();
        $question->options()->create($input);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionOption  $questionOption
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionOption  $questionOption
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionOption  $questionOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionOption $questionOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionOption  $questionOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionOption $questionOption)
    {
        //
    }
}
