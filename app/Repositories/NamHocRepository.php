<?php

namespace App\Repositories;

use App\NamHoc;
use Illuminate\Http\Request;
use App\Http\Resources\NamHocResource;
use App\Http\Requests\StoreNamHocRequest;
use App\Http\Requests\UpdateNamHocRequest;

class NamHocRepository
{
    /**
     * Get all of the NamHocs for a given NamHoc.
     *
     * @return Collection
     */
    public function collectionNamHoc()
    {
        return NamHocResource::collection(NamHoc::paginate(25));
    }

    public function storeNamHoc(StoreNamHocRequest $request)
    {
        return new NamHocResource(NamHoc::create($request->all()));
    }

    public function updateNamHoc(UpdateNamHocRequest $request, NamHoc $namhoc)
    {
        $namhoc->update($request->all());

        return new NamHocResource($namhoc);
    }

    public function deleteNamHoc($namhoc)
    {
      $namhoc->delete();

      return response()->json(null, 204);
    }
}
