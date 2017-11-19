<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FetchTest extends TestCase
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
   
    public function testShouldFetchFirstRecipe()
    {
      $this->json('GET', '/api/recipes/1')
         ->seeJson([
            'title' => 'Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad',
            'id'    => 1
         ])->assertResponseStatus(200);
    }

    public function testShouldFetchSecondRecipe()
    {
      $this->json('GET', '/api/recipes/2')
         ->seeJson([
            'title' => 'Tamil Nadu Prawn Masala',
            'id'    => 2
         ])->assertResponseStatus(200);
    }

    public function testShouldWarnAboutInvalidRecipeId()
    {
      $this->json('GET', '/api/recipes/23232')
         ->seeJson([ 'Invalid recipe id',
         ])->assertResponseStatus(422);
    }
}
