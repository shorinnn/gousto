<?php
namespace App\Repositories\RecipeRating;
use App\Recipe;
use App\RecipeRating;
use \App\Repositories\EloquentRepository;

class RecipeRatingEloquentRepository extends EloquentRepository implements RecipeRatingInterface
{

    protected $model;

    public function __construct()
    {
        $this->model = new RecipeRating;

    }

    public function validationRules($id = 0)
    {
        $rules = [
          'rating' => 'required|numeric|between:1,5'
        ];

        return $rules;
    }

    public function validationMessages()
    {
        return [
        ];
    }

    public function validateRecipeAndCreate($id, $attributes){
        $recipeInterface  = new Recipe;
        $recipe = $recipeInterface->find($id);

        if( !$recipe ){
          return response()->json(['recipe_id' => ['Recipe does not exist']], 422, ['X-Header-One' => 'Header Value']);
        }

        $attributes['recipe_id'] = $id;
        return parent::create($attributes);
    }


}
