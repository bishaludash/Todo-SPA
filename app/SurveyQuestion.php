<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
     protected $guarded =[];

     public function survey(){
     	return $this->belongsTo(Survey::class);
     }

     public function options(){
     	return $this->hasMany(QuestionOption::class, 'question_id');
     }
}
