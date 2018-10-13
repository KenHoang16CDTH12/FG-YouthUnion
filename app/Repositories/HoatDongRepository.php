<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\HoatDong;
use App\Http\Resources\HoatDongResource;

class HoatDongRepository
{

    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries, $sort)
    {
        // Return collection of objects as a resource
        return HoatDongResource::collection(HoatDong::orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText, $sort)
    {
        $query = HoatDong::where('id', $searchText)
                     ->orWhere('name', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return HoatDongResource::collection($query->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get coming up of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionComingUp($entries, $sort)
    {

        // Return collection of objects as a resource
        return HoatDongResource::collection(
            HoatDong::whereDate('from_date', '>=', Carbon::today()->toDateString())
                     ->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get happenning of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionHappening($entries, $sort)
    {

        // Return collection of objects as a resource
        return HoatDongResource::collection(
            HoatDong::whereDate('from_date', '<=', Carbon::today()->toDateString())
                     ->whereDate('end_date', '>=', Carbon::today()->toDateString())
                     ->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get finished of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionFinished($entries, $sort)
    {

         // Return collection of objects as a resource
        return HoatDongResource::collection(
            HoatDong::whereDate('end_date', '<=', Carbon::today()->toDateString())
                     ->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Return object
        return new HoatDongResource(HoatDong::findOrFail($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // Return object
        return new HoatDongResource(HoatDong::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $hoatdong = HoatDong::findOrFail($id);
        $hoatdong->update($request->only(['name','desc','from_date','end_date', 'hoatdong_type_id']));
        // Return object
        return new HoatDongResource($hoatdong);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hoatdong = HoatDong::findOrFail($id);
      $hoatdong->delete();
      return response()->json(null, 204);
    }
}
