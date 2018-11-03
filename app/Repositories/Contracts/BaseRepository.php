<?php
namespace App\Repositories\Contracts;
interface BaseRepository{
    public function paginate(int $perPage,$relation, $colum = ['*']);
    public function all();
    public function find(int $id, $relation);
    public function findByField($field,$value,$relation);
    public function findWhere($where,$relation);
    public function create($params);
    public function update(int $id, $params);
    public function delete(int $id);
    public function deleteWhere($where);
    public function orderBy($column, $direction = 'asc');
}