<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Contracts\NotificationRepository;

class NotificationRepositoryEloquent extends BaseRepositoryEloquent implements NotificationRepository {

    public function __construct()
    {
        $this->model = app(Notification::class);
    }

    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function paginateNotify($user_id, $perPage, $sort)
    {
        $relations = $this->model->relations;

        return new $this->dataCollection($this->model->with($relations)->latest()->where('user_id', $user_id)->orderBy('id', $sort)->paginate($perPage));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return paginate
     */
    public function paginateNotifySearch($user_id, $perPage, $searchText, $sort)
    {
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

      return new $this->dataCollection($query->where('user_id', $user_id)->orderBy('id', $sort)->paginate($perPage));
    }

    /**
     * Display the specified resource.
     *
     * @param  user_id  $id
     * @return \Illuminate\Http\Response
     */
    public function showNotify($user_id, $id)
    {
        //Return object
        return new $this->dataResource(Notification::where('user_id', $user_id)->where('id', $id)->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $user_id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyNotify($user_id, $id)
    {
      $notification = Notification::where('user_id', $user_id)->where('id', $id)->first();
      $notification->delete();
      return response()->json(null, 204);
    }

     /**
     * Remove all notification by user_id.
     *
     * @param  $user_id
     * @return \Illuminate\Http\Response
     */
    public function clearNotify($user_id)
    {
      Notification::where('user_id', $user_id)->delete();
      return response()->json(null, 204);
    }
}
