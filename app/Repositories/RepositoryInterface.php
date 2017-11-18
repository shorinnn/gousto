<?php namespace App\Repositories;


interface RepositoryInterface {

  public function find(int $id);
  public function findBy(string $field, string $value, int $perPage);
	public function create(array $attributes);
	public function update(int $id, array $attributes);

}
