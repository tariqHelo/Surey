<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     protected $table = 'sections' ;
     protected $fillable = [
     'title' ,
     ];

     public function questions()
     {
     return $this->hasMany(Question::class) ;
     }
     public function questionAnswers()
     {
     return $this->hasMany(QuestionAnswer::class) ;
     }
}
