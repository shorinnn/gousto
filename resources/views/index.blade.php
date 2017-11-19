<h1 id="gousto">Gousto</h1>

<p>API Test</p>

<h2 id="howtoinstall">How to install</h2>

<p>Drop this folder in a web server's (running PHP7) public directory and browse to it.
e.g.: If running wamp, browse to http://localhost/gousto</p>

<h3 id="apiendpoints">API endpoints</h3>

<h4 id="fetchrecipebyid">Fetch recipe by id</h4>

<p>GET http://localhost/gousto/api/recipes/ID</p>

<p>eg http://localhost/gousto/api/recipes/1</p>

<h4 id="fetchrecipebycuisine">Fetch recipe by cuisine</h4>

<p>GET http://localhost/gousto/api/recipes/findby/SEARCHFIELD/SEARCHVALUE/RESULTSPERPAGE</p>

<p>eg http://localhost/gousto/api/recipes/findby/recipe_cuisine/british/2</p>

<h4 id="storerecipe">Store recipe</h4>

<p>POST http://localhost/gousto/api/recipes/</p>

<p>Payload example:
[
      "box<em>type"=>"vegetarian",
      "title"=>"New Test Recipe",
      "short</em>title"=>"null",
      "marketing<em>description"=>"Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
      "calories</em>kcal"=>4401,
      "protein<em>grams"=>112,
      "fat</em>grams"=>335,
      "carbs<em>grams"=>20,
      "bulletpoint1"=>"B1",
      "bulletpoint2"=>"",
      "bulletpoint3"=>"",
      "recipe</em>diet<em>type</em>id"=>"meat",
      "season"=>"all",
      "base"=>"noodles",
      "protein<em>source"=>"beef",
      "preparation</em>time<em>minutes"=>35,
      "shelf</em>life<em>days"=>4,
      "equipment</em>needed"=>"Appetite",
      "origin<em>country"=>"Great Britain",
      "recipe</em>cuisine"=>"british",
      "in<em>your</em>box"=>"",
      "gousto_reference"=>559
    ];</p>

<h4 id="updaterecipe">Update recipe</h4>

<p>PUT http://localhost/gousto/api/recipes/ID</p>

<p>eg http://localhost/gousto/api/recipes/1</p>

<p>Payload example ['title'=>'Edited']</p>

<h4 id="raterecipe">Rate recipe</h4>

<p>POST http://localhost/gousto/api/recipes/ID/rate</p>

<p>eg http://localhost/gousto/api/recipes/1/rate</p>

<p>Payload example ['rating'=>3]</p>

<h2 id="whylumenframework">Why Lumen Framework</h2>

<p>Lumen is a "micro-framework" based on Laravel, which is faster and leaner than the original framework. Lumen is not designed to replace Laravel, rather, it is a more specialized (and stripped-down) framework designed for micro-services and APIs.</p>

<p>Laravel is a PHP framework praised by the PHP community for its reach features as well as simplicity.</p>

<h2 id="howthesolutioncaterstodifferentapiconsumers">How the solution caters to different API consumers</h2>

<p>Different API consumers, mobile apps or websites, would interact with the API in the same way: fire HTTP requests to the API's endpoints and receive a JSON response.</p>

<h2 id="other">Other</h2>

<p>Tests can be run by running <code>phpunit</code> in the project's root folder</p>

<p>The Postman Chrome extension can be used to fire requests at the API: https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop?hl=en</p>

<p>SQLite database is being used. DB Can be refreshed by running <code>php artisan migrate:refresh --seed</code></p>

<p>Test environment uses in memory DB.</p>
