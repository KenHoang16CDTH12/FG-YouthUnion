<?php
namespace App\Repositories\Contracts;
class BaseRepositoryEloquent implements BaseRepository{
    protected $model;
    protected $resouceCollection;

    public function paginate(int $perPage,$relation = [], $colum = ['*']){
      return new $this->resouceCollection($this->model->with($relation)->latest()->paginate($perPage));
    }

    public function all(){
      return new $this->resouceCollection($this->model->get());
    }

    public function find(int $id, $relation = []){
      return new $this->resouceCollection($this->model->with($relation)->find($id));
    }

    public function findByField($field,$value,$relation = [],$colum = ['*']){

    }

    public function findWhere($where,$relation = [], $colum = ['*']){

    }

    public function create($params){
     return new $this->resouceCollection($this->model->create($params));
    }

    public function update(int $id, $params){
        return new $this->resouceCollection($this->model->find($id)->update($params));
    }

    public function delete(int $id){
        $this->model->findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function deleteWhere($where){

    }
    
    public function orderBy($column, $direction = 'asc'){

    }
}