<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
   protected $guarded = ['id'];
   
   public function ratings()
   {
       return $this->hasMany('App\RecipeRating');
   }

}
