<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'question_answers' ;
    protected $fillable = [
    'value' , 'section_id' ,
    ];

    public function section()
    {
    return $this->belongsTo(Section::class , 'section_id' , 'id') ;
    }
}
