<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['middleware' => 'Throttle:100,1'], function() use($router){

  $router->get('/', function () use ($router) {
      return view('index');
  });

  $router->group(['prefix'=>'api/recipes'], function() use($router){

    $router->get('/', function(){
      return view('endpoints');
    });
    // Fetch a recipe by ID
    $router->get('/{id}', 'RecipesController@show');

    // Fetch all recipes for a specific cuisine (should paginate)
    $router->get('/findby/{key}/{value}[/{perPage}]', 'RecipesController@findBy');

    // Store a new recipe
    $router->post('/', 'RecipesController@store');

    // Update an existing recipe
    $router->put('/{id}', 'RecipesController@update');

    // Rate a recipe
    $router->post('/{id}/rate', 'RecipeRatingsController@store');

  });

});
