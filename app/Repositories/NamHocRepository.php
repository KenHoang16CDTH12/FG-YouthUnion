<?php

namespace App\Repositories;

use App\NamHoc;
use App\Http\Resources\NamHocResource;

class NamHocRepository
{
     /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return NamHocResource::collection(NamHoc::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = NamHoc::where('id', $searchText)
                     ->orWhere('nam_hoc', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return NamHocResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        return new NamHocResource(NamHoc::findOrFail($id));
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
        return new NamHocResource(NamHoc::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $nam_hoc = NamHoc::findOrFail($id);
        $nam_hoc->update($request->only(['nam_hoc']));
        // Return object
        return new NamHocResource($nam_hoc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $nam_hoc = NamHoc::findOrFail($id);
      $nam_hoc->delete();
      return response()->json([
          'meesage' => 'Delete #' . $id . ' successful!'
      ], 200);
    }
}
