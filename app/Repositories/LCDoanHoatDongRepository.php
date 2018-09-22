<?php

namespace App\Repositories;

use App\Models\LCDoanHoatDong;
use App\Http\Resources\LCDoanHoatDongResource;

class LCDoanHoatDongRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return LCDoanHoatDongResource::collection(LCDoanHoatDong::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = LCDoanHoatDong::where('id', $searchText)
                     ->orWhere('lcdoan_id', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('hoatdong_id', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return LCDoanHoatDongResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        return new LCDoanHoatDongResource(User::findOrFail($id));
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
        return new LCDoanHoatDongResource(LCDoanHoatDong::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $lcdoanhoatdong = LCDoanHoatDong::findOrFail($id);
        $lcdoanhoatdong->update($request->only(['hoatdong_id', 'lcdoan_id']));
        // Return object
        return new LCDoanHoatDongResource($lcdoanhoatdong);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $lcdoanhoatdong = LCDoanHoatDong::findOrFail($id);
      $lcdoanhoatdong->delete();
      return response()->json(null, 204);
    }
}
