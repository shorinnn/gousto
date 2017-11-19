<h3 id="apiendpoints">API endpoints</h3>


<h4 id="fetchrecipebyid">Fetch recipe by id</h4>

<p>GET api/recipes/ID</p>

<p>eg /api/recipes/1</p>

<h4 id="fetchrecipebycuisine">Fetch recipe by cuisine</h4>

<p>GET api/recipes/findby/SEARCHFIELD/SEARCHVALUE/RESULTSPERPAGE</p>

<p>eg api/recipes/findby/recipe_cuisine/british/2</p>

<h4 id="storerecipe">Store recipe</h4>

<p>POST api/recipes/</p>

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

<p>PUT api/recipes/ID</p>

<p>eg /api/recipes/1</p>

<p>Payload example ['title'=>'Edited']</p>

<h4 id="raterecipe">Rate recipe</h4>

<p>POST api/recipes/ID/rate</p>

<p>eg /api/recipes/1/rate</p>

<p>Payload example ['rating'=>3]</p>
