<?php

namespace App\Repositories;

use App\HoatDong;
use App\Http\Resources\HoatDongResource;

class HoatDongRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return HoatDongResource::collection(HoatDong::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = HoatDong::where('id', $searchText)
                     ->orWhere('name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('desc', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('from_date', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('end_date', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('hocky_id', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('hoatdong_type_id', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return HoatDongResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        $hoatdong->update($request->only(['name','desc','from_date','end_date','hocky_id','hoatdong_type_id']));
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
      return response()->json([
          'meesage' => 'Delete #' . $id . ' successful!'
      ], 200);
    }
}
