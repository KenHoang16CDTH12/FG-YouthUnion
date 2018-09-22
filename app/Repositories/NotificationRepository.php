<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Http\Resources\NotificationResource;

class NotificationRepository
{
     /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($user_id, $entries, $sort)
    {
        // Return collection of objects as a resource
        return NotificationResource::collection(Notification::where('user_id', $user_id)->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($user_id, $entries, $searchText, $sort)
    {
        $query = Notification::where('user_id', $user_id)
                     ->where(function($q) use ($searchText) {
                          $q->where('title', 'LIKE', '%'.$searchText.'%')
                            ->orWhere('message', 'LIKE', '%'.$searchText.'%');
                      });
        // Return collection of objects as a resource
        return NotificationResource::collection($query->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Display the specified resource.
     *
     * @param  user_id  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, $id)
    {
        //Return object
        return new NotificationResource(Notification::where('user_id', $user_id)->where('id', $id)->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  $user_id  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // Return object
        return new NotificationResource(
            Notification::create($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $user_id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $id)
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
    public function clear($user_id)
    {
      Notification::where('user_id', $user_id)->delete();
      return response()->json(null, 204);
    }
}
