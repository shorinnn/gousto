<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FetchByCuisineTest extends TestCase
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

    public function testShouldFetchBritishCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/british')
         ->seeJson([
            'recipe_cuisine' => 'british',
         ])->assertResponseStatus(200);
    }

    public function testShouldFetchItalianCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/italian')
         ->seeJson([
            'recipe_cuisine' => 'italian',
         ])->assertResponseStatus(200);
    }

    public function testShouldFetchAll4BritishCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/british')
         ->seeJson([
            'recipe_cuisine' => 'british',
            'total' => 4
         ])->assertResponseStatus(200);
    }

    public function testShouldNotFetchMartianCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/martian')
         ->seeJson([
            'total' => 0,
         ])->assertResponseStatus(200);
    }

    public function testShouldPaginate2BritishCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/british/2')
         ->seeJson([
            'recipe_cuisine' => 'british',
            'current_page' => 1,
            'total' => 4,
            'per_page' => 2,
         ])->assertResponseStatus(200);
    }

    public function testShouldGetPage2Paginate2BritishCuisine()
    {
      $this->json('GET', '/api/recipes/findby/recipe_cuisine/british/2?page=2')
         ->seeJson([
            'recipe_cuisine' => 'british',
            'current_page' => 2,
            'total' => 4,
            'per_page' => 2,
         ])->assertResponseStatus(200);
    }


}
