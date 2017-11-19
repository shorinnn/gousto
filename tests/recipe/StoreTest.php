<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class StoreTest extends TestCase
{

  use DatabaseMigrations {
       runDatabaseMigrations as baseRunDatabaseMigrations;
   }

   /**
    * Define hooks to migrate the database before and after each test.
    *
    * @return void
    */
   public function runDatabaseMigrations()
   {
       $this->baseRunDatabaseMigrations();
       $this->artisan('db:seed');
   }

  public $recipe_data = [
      "box_type"=>"vegetarian",
      "title"=>"New Test Recipe",
      "short_title"=>"null",
      "marketing_description"=>"Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
      "calories_kcal"=>4401,
      "protein_grams"=>112,
      "fat_grams"=>335,
      "carbs_grams"=>20,
      "bulletpoint1"=>"B1",
      "bulletpoint2"=>"",
      "bulletpoint3"=>"",
      "recipe_diet_type_id"=>"meat",
      "season"=>"all",
      "base"=>"noodles",
      "protein_source"=>"beef",
      "preparation_time_minutes"=>35,
      "shelf_life_days"=>4,
      "equipment_needed"=>"Appetite",
      "origin_country"=>"Great Britain",
      "recipe_cuisine"=>"british",
      "in_your_box"=>"",
      "gousto_reference"=>559
    ];

    public function testCreateRecipe()
    {
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->seeJson([
            'title' => 'New Test Recipe',
         ])
         ->seeInDatabase('recipes',['title'=>'New Test Recipe'])
         ->assertResponseStatus(200);
    }

    public function testSlugIsSet()
    {
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->seeJson([
            'title' => 'New Test Recipe',
            'slug'  => 'new-test-recipe'
         ])
         ->seeInDatabase('recipes',['slug'=> 'new-test-recipe'])
         ->assertResponseStatus(200);
    }

    public function testCantSetId()
    {
      $this->recipe_data['id'] = 333;
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->notSeeInDatabase('recipes',['id' => 333])
         ->assertResponseStatus(200);
    }

    public function testCantCreateMissingFields()
    {
      unset( $this->recipe_data['box_type'] );
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->seeJson([
           'The box type field is required.'
         ])
         ->notSeeInDatabase('recipes',['title'=> 'New Test Recipe'])
         ->assertResponseStatus(422);
    }

    public function testCantCreateInvalidRecipeCuisine()
    {
      $this->recipe_data['recipe_cuisine'] = 'Martian';
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->seeJson([
           'The selected recipe cuisine is invalid.'
         ])
         ->notSeeInDatabase('recipes',['title'=> 'New Test Recipe'])
         ->assertResponseStatus(422);
    }

    public function testCantCreateTitleIsTaken()
    {
      $this->json('POST', '/api/recipes/', $this->recipe_data)
         ->seeJson([
            'title' => 'New Test Recipe',
         ])
         ->seeInDatabase('recipes',['title'=>'New Test Recipe'])
         ->assertResponseStatus(200);

         $this->recipe_data['gousto_reference'] = 5678;

         $this->json('POST', '/api/recipes/', $this->recipe_data)
            ->notSeeInDatabase('recipes',['gousto_reference'=>5678])
            ->assertResponseStatus(422);
    }



}
