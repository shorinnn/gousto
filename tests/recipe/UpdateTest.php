<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UpdateTest extends TestCase
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


    public function testUpdateFirstRecipe()
    {
      $this->json('PUT', '/api/recipes/1', ['title'=>'Edited'])
         ->seeInDatabase('recipes',['title'=>'Edited'])
         ->assertResponseStatus(200);
    }

    public function testCantUpdateInvalidRecipe()
    {
      $this->json('PUT', '/api/recipes/234', ['title'=>'Edited'])
         ->notSeeInDatabase('recipes',['title'=>'Edited'])
         ->assertResponseStatus(200);
    }

    public function testCantUpdateDuplicateTitle()
    {
      $this->json('PUT', '/api/recipes/1', ['title'=>'Edited'])
         ->seeInDatabase('recipes',['id'=>1, 'title'=>'Edited'])
         ->assertResponseStatus(200);

      $this->json('PUT', '/api/recipes/2', ['title'=>'Edited'])
         ->notSeeInDatabase('recipes',['id'=>2,'title'=>'Edited'])
         ->assertResponseStatus(422);
    }

    public function testCantUpdateInvalidRecipeCuisine()
    {
      $this->json('PUT', '/api/recipes/1', ['recipe_cuisine'=>'Martian'])
         ->seeJson([
           'The selected recipe cuisine is invalid.'
         ])
         ->notSeeInDatabase('recipes',['recipe_cuisine'=> 'Martian'])
         ->assertResponseStatus(422);
    }






}
