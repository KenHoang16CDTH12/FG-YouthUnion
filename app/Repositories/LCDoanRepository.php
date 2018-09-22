<?php

namespace App\Repositories;

use App\Models\LCDoan;
use App\Http\Resources\LCDoanResource;

class LCDoanRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return LCDoanResource::collection(LCDoan::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = LCDoan::where('id', $searchText)
                     ->orWhere('name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('desc', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return LCDoanResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        return new LCDoanResource(LCDoan::findOrFail($id));
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
        return new LCDoanResource(LCDoan::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $lcdoan = LCDoan::findOrFail($id);
        $lcdoan->update($request->only(['name', 'desc']));
        // Return object
        return new LCDoanResource($lcdoan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $lcdoan = LCDoan::findOrFail($id);
      $lcdoan->delete();
      return response()->json(null, 204);
    }
}
