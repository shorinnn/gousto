<?php

namespace App\Http\Controllers;
use \App\Repositories\Recipe\RecipeInterface;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function __construct( RecipeInterface $recipe) {
        $this->recipe = $recipe;
    }

    public function show($id=0)
    {
      if($id==0) return response()->json(['recipe_id' => ['Missing recipe id']], 422, ['X-Header-One' => 'Header Value']);
      return $this->recipe->find($id);
    }

    public function findBy($key, $value, $perPage = 10){
      return $this->recipe->findBy($key, $value, $perPage);
    }

    public function store(Request $request){
      $this->validate($request, $this->recipe->validationRules() );

      return $this->recipe->create( $request->all() );
    }

    public function update($id, Request $request){
      $this->validate($request, $this->recipe->updateValidationRules($id) );

      return $this->recipe->update($id, $request->all() );
    }

}
