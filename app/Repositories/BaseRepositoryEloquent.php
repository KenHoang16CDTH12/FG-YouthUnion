<?php

namespace App\Repositories;

use App\Http\Resources\DataResource;
use App\Http\Resources\DataCollection;
use App\Repositories\Contracts\BaseRepository;

class BaseRepositoryEloquent implements BaseRepository {

    protected $model;
    protected $dataResource = DataResource::class;
    protected $dataCollection = DataCollection::class;

    public function paginate($perPage, $sort){

      $relations = $this->model->relations;

      return new $this->dataCollection($this->model->with($relations)->latest()->orderBy('id', $sort)->paginate($perPage));
    }

    public function paginateSearch($perPage, $sort, $searchText){

      $relations = $this->model->relations;
      $searchColumns = $this->model->searchColumns;

      $query = $this->model->with($relations)->latest();
      $isFirst = true;
      foreach ($searchColumns as $col) {
        if ($isFirst) {
            $query = $query->where($col, 'LIKE', '%'.$searchText.'%');
            $isFirst = false;
        }
        else
            $query = $query->orWhere($col, 'LIKE', '%'.$searchText.'%');
      }

      return new $this->dataCollection($query->orderBy('id', $sort)->paginate($perPage));
    }

    public function all(){
      return new $this->dataResource($this->model->get());
    }

    public function find($id){

      $relations = $this->model->relations;

      return new $this->dataResource($this->model->with($relations)->latest()->findOrFail($id));
    }

    public function findByField($field, $value){

    }

    public function findWhere($where){

    }

    public function create($params) {
       return new $this->dataResource($this->model->create($params));
    }

    public function createIfNotExists($params) {
      $object = $this->model->checkExistsObject($params);

      if ($object == null) {
          return new $this->dataResource($this->model->create($params));
      } else {
          return new $this->dataResource($object);
      }
    }

    public function update($id, $params){
        $object = $this->model->findOrFail($id);
        $object->update($params);
        return new $this->dataResource($object);
    }

    public function delete($id){
        $this->model->findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function deleteWhere($where){

    }

    public function orderBy($column, $direction = 'asc'){

    }
}
