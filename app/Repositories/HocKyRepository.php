<?php

namespace App\Repositories;

use App\HocKy;
use Illuminate\Http\Request;
use App\Http\Resources\HocKyResource;
use App\Http\Requests\StoreHocKyRequest;
use App\Http\Requests\UpdateHocKyRequest;

class HocKyRepository
{
    /**
     * Get all of the hockys for a given hocky.
     *
     * @return Collection
     */
    public function collectionHocKy()
    {
        return HocKyResource::collection(HocKy::paginate(25));
    }

    public function storeHocKy(StoreHocKyRequest $request)
    {
        return new HocKyResource(HocKy::create($request->all()));
    }

    public function updateHocKy(UpdateHocKyRequest $request, HocKy $hocky)
    {
        $hocky->update($request->all());

        return new HocKyResource($hocky);
    }

    public function deleteHocKy(HocKy $hocky)
    {
      $hocky->delete();

      return response()->json(null, 204);
    }
}
