<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
     protected $guarded =[];

     public function question(){
     	return $this->belongsTO(SurveyQuestion::class);
     }
}
