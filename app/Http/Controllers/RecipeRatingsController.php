<?php

namespace App\Http\Controllers;
use \App\Repositories\RecipeRating\RecipeRatingInterface;
use Illuminate\Http\Request;

class RecipeRatingsController extends Controller
{
    public function __construct( RecipeRatingInterface $recipeRating) {
        $this->recipeRating = $recipeRating;
    }

    public function store(int $id, Request $request){
      $this->validate($request, $this->recipeRating->validationRules() );


      return $this->recipeRating->validateRecipeAndcreate($id, $request->all());
    }



}
