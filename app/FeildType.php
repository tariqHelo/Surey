<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeildType extends Model
{
      protected $table = 'feild_types';
      protected $fillable = [
      'type'
      ] ;

      public function questions()
      {
      return $this->hasMany(Question::class);
      }
}
