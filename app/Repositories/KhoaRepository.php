<?php

namespace App\Repositories;

use App\Models\Khoa;
use App\Http\Resources\KhoaResource;

class KhoaRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return KhoaResource::collection(Khoa::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = Khoa::where('id', $searchText)
                     ->orWhere('name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('desc', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('lcdoan_id', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return KhoaResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        return new KhoaResource(Khoa::findOrFail($id));
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
        return new KhoaResource(Khoa::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $khoa = Khoa::findOrFail($id);
        $khoa->update($request->only(['name', 'desc', 'lcdoan_id']));
        // Return object
        return new KhoaResource($khoa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $khoa = Khoa::findOrFail($id);
      $khoa->delete();
      return response()->json(null, 204);
    }
}
