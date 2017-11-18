<?php
namespace App\Repositories\Recipe;
use App\Recipe;
use \App\Repositories\EloquentRepository;

class RecipeEloquentRepository extends EloquentRepository  implements RecipeInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Recipe;
    }

    public function validationRules($id = 0)
    {
        $rules = [
          'box_type' => 'required|in:vegetarian,gourmet',
          'title' => 'required|unique:recipes,title',
          'marketing_description' => 'required',
          'calories_kcal' => 'required|numeric',
          'protein_grams' => 'required|numeric',
          'fat_grams' => 'required|numeric',
          'carbs_grams' => 'required|numeric',
          'recipe_diet_type_id' => 'required|in:meat,fish,vegetarian',
          'season' => 'required|in:all,spring,summer,autumn,winter',
          'protein_source' => 'required',
          'preparation_time_minutes' => 'required|numeric',
          'shelf_life_days' => 'required|numeric',
          'equipment_needed' => 'required',
          'origin_country' => 'required',
          'recipe_cuisine' => "required|in:asian,italian,british,mediterranean,mexican",
          'gousto_reference' => 'required|numeric'
        ];

        return $rules;
    }

    public function updateValidationRules($id = 0)
    {
        $rules = [
          'box_type' => 'sometimes|required|in:vegetarian,gourmet',
          'title' => 'sometimes|required|unique:recipes,title,'.$id,
          'marketing_description' => 'sometimes|required',
          'calories_kcal' => 'sometimes|required|numeric',
          'protein_grams' => 'sometimes|required|numeric',
          'fat_grams' => 'sometimes|required|numeric',
          'carbs_grams' => 'sometimes|required|numeric',
          'recipe_diet_type_id' => 'sometimes|required|in:meat,fish,vegetarian',
          'season' => 'sometimes|required|in:all,spring,summer,autumn,winter',
          'protein_source' => 'sometimes|required',
          'preparation_time_minutes' => 'sometimes|required|numeric',
          'shelf_life_days' => 'sometimes|required|numeric',
          'equipment_needed' => 'sometimes|required',
          'origin_country' => 'sometimes|required',
          'recipe_cuisine' => "sometimes|required|in:asian,italian,british,mediterranean,mexican",
          'gousto_reference' => 'sometimes|required|numeric'
        ];

        return $rules;
    }

    public function validationMessages()
    {
        return [
        ];
    }

    public function create(array $attributes){
      $attributes['slug'] = str_slug($attributes['title']);
      return parent::create($attributes);
    }

    public function update(int $id, array $attributes){
      $attributes['slug'] = str_slug($attributes['title']);
      return parent::update($id, $attributes);
    }


}
