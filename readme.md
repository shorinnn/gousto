# Gousto
API Test

##How to install
Drop this folder in a web server's (running PHP7) public directory and browse to it.
e.g.: If running wamp, browse to http://localhost/gousto ( or to http://localhost/gousto/public if modrewrite is not enabled)

###API endpoints
####Fetch recipe by id
GET http://localhost/gousto/api/recipes/ID

eg http://localhost/gousto/api/recipes/1

####Fetch recipe by cuisine
GET http://localhost/gousto/api/recipes/findby/SEARCHFIELD/SEARCHVALUE/RESULTSPERPAGE

eg http://localhost/gousto/api/recipes/findby/recipe_cuisine/british/2

####Store recipe
POST http://localhost/gousto/api/recipes/

Payload example:
[
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

####Update recipe
PUT http://localhost/gousto/api/recipes/ID

eg http://localhost/gousto/api/recipes/1

Payload example ['title'=>'Edited']


####Rate recipe
POST http://localhost/gousto/api/recipes/ID/rate

eg http://localhost/gousto/api/recipes/1/rate

Payload example ['rating'=>3]



##Why Lumen Framework
Lumen is a "micro-framework" based on Laravel, which is faster and leaner than the original framework. Lumen is not designed to replace Laravel, rather, it is a more specialized (and stripped-down) framework designed for micro-services and APIs.

Laravel is a PHP framework praised by the PHP community for its reach features as well as simplicity.

##How the solution caters to different API consumers
Different API consumers, mobile apps or websites, would interact with the API in the same way: fire HTTP requests to the API's endpoints and receive a JSON response.

##Other
Tests can be run by running `phpunit` in the project's root folder

The Postman Chrome extension can be used to fire requests at the API: https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop?hl=en

SQLite database is being used. DB Can be refreshed by running `php artisan migrate:refresh --seed`

Test environment uses in memory DB.

Request throttled at 100 per minute.
