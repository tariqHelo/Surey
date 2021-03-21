<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
       protected $table = 'questions';
       protected $fillable = [
       'title' , 'section_id' , "feild_type_id"
       ];

       public function section()
       {
              return $this->belongsTo(Section::class , 'section_id' , 'id') ;
       }
       public function feialdType()
       {
              return $this->belongsTo(FeildType::class , 'feild_type_id' , 'id') ;
       }
}
