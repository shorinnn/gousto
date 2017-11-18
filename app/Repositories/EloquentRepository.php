<?php namespace App\Repositories;


class EloquentRepository {

  public function find(int $id){
    $model = $this->model->find($id);
    if(!$model) return response()->json(['recipe_id' => ['Invalid recipe id']], 422, ['X-Header-One' => 'Header Value']);
    return $model;
  }

  public function findBy(string $field, string $value, int $perPage){
    return $this->model->where($field, $value)->paginate( $perPage );
  }

	public function create(array $attributes){
    return $this->model->create($attributes);
  }

	public function update(int $id, array $attributes){
    return $this->model->where('id', $id)->update($attributes);
  }

}
