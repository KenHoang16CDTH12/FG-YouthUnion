<?php

namespace App\Repositories\Contracts;

interface BaseRepository{

    public function paginate($perPage, $sort);

    public function paginateSearch($perPage, $sort, $searchText);

    public function all();

    public function find($id);

    public function findByField($field, $value);

    public function findWhere($where);

    public function create($params);

    public function createIfNotExists($params);

    public function update($id, $params);

    public function delete($id);

    public function deleteWhere($where);

    public function orderBy($column, $direction = 'asc');
}
