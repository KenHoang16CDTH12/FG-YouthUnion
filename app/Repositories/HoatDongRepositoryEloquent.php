<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\HoatDong;
use App\Repositories\Contracts\HoatDongRepository;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class HoatDongRepositoryEloquent extends BaseRepositoryEloquent implements HoatDongRepository {

    public function __construct()
    {
        $this->model = app(HoatDong::class);
    }

    public function create($params)
    {
        $data = new $this->dataResource($this->model->create($params));
        $avatar = Avatar::create($data->image)->getImageObject()->encode('png');
        Storage::put('hoatdongimage/'.$data->id.'/default.png', (string) $avatar);
        return $data;
    }

    public function paginateCommingUp($perPage, $sort){
      $relations = $this->model->relations;

      return new $this->dataCollection($this->model->with($relations)->latest()->whereDate('from_date', '>=', Carbon::today()->toDateString())->orderBy('id', $sort)->paginate($perPage));
    }

    public function paginateCommingUpSearch($perPage, $sort, $searchText){

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

      return new $this->dataCollection($query->whereDate('from_date', '>=', Carbon::today()->toDateString())->orderBy('id', $sort)->paginate($perPage));

    }

    public function paginateHappening($perPage, $sort){

      $relations = $this->model->relations;

      return new $this->dataCollection($this->model->with($relations)->latest()
        ->whereDate('from_date', '<=', Carbon::today()->toDateString())
        ->whereDate('end_date', '>=', Carbon::today()->toDateString())
        ->orderBy('id', $sort)->paginate($perPage));
    }

    public function paginateHappeningSearch($perPage, $sort, $searchText){

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

      return new $this->dataCollection(
                 $query->whereDate('from_date', '<=', Carbon::today()->toDateString())
                     ->whereDate('end_date', '>=', Carbon::today()
                     ->toDateString())
                     ->orderBy('id', $sort)
                     ->paginate($perPage)
                   );

    }

    public function paginateFinished($perPage, $sort){

      $relations = $this->model->relations;

      return new $this->dataCollection($this->model->with($relations)->latest()->whereDate('end_date', '<=', Carbon::today()->toDateString())->orderBy('id', $sort)->paginate($perPage));

    }

    public function paginateFinishedSearch($perPage, $sort, $searchText){

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

      return new $this->dataCollection($query->whereDate('end_date', '<=', Carbon::today()->toDateString())->orderBy('id', $sort)->paginate($perPage));

    }
}
