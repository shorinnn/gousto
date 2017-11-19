<?php
namespace App\Tests\RecipeRating;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class StoreTest extends \TestCase
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

    public function testRateRecipe()
    {

      $this->json('POST', '/api/recipes/1/rate', ['rating'=>3])
         ->seeInDatabase('recipe_ratings',['recipe_id'=>1, 'rating'=>3])
         ->assertResponseStatus(200);
    }

    public function testCantRateInvalidRecipe()
    {
      $this->json('POST', '/api/recipes/123/rate', ['rating'=>3])
      ->seeJson(['Recipe does not exist'])
         ->notSeeInDatabase('recipe_ratings',['recipe_id'=>123, 'rating'=>3])
         ->assertResponseStatus(422);
    }

    public function testCantRateMoreThan5()
    {
      $this->json('POST', '/api/recipes/1/rate', ['rating'=>50])
      ->seeJson(['The rating must be between 1 and 5.'])
         ->notSeeInDatabase('recipe_ratings',['recipe_id'=>1, 'rating'=>50])
         ->assertResponseStatus(422);
    }

    public function testCantRateLessThan1()
    {
      $this->json('POST', '/api/recipes/1/rate', ['rating'=>0])
      ->seeJson(['The rating must be between 1 and 5.'])
         ->notSeeInDatabase('recipe_ratings',['recipe_id'=>1, 'rating'=>50])
         ->assertResponseStatus(422);
    }



}
