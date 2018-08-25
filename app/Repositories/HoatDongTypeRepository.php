<?php

namespace App\Repositories;

use App\HoatDongType;
use Illuminate\Http\Request;
use App\Http\Resources\HoatDongTypeResource;
use App\Http\Requests\StoreHoatDongTypeRequest;
use App\Http\Requests\UpdateHoatDongTypeRequest;

class HoatDongTypeRepository
{
    /**
     * Get all of the users for a given user.
     *
     * @return Collection
     */
    public function collectionHoatDongType()
    {
        return HoatDongTypeResource::collection(HoatDongType::paginate(25));
    }

    public function storeHoatDongType(StoreHoatDongTypeRequest $request)
    {
        return new HoatDongTypeResource(HoatDongType::create($request->all()));
    }

    public function updateHoatDongType(UpdateHoatDongTypeRequest $request, HoatDongType $hoatdongtype)
    {
        $hoatdongtype->update($request->all());

        return new HoatDongTypeResource($hoatdongtype);
    }

    public function deleteHoatDongType(HoatDongType $hoatdongtype)
    {
      $hoatdongtype->delete();

      return response()->json(null, 204);
    }
}
