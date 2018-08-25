<?php

namespace App\Repositories;

use App\LCDoanHoatDong;
use Illuminate\Http\Request;
use App\Http\Resources\LCDoanHoatDongResource;
use App\Http\Requests\StoreLCDoanHoatDongRequest;
use App\Http\Requests\UpdateLCDoanHoatDongRequest;

class LCDoanHoatDongRepository
{
    /**
     * Get all of the users for a given user.
     *
     * @return Collection
     */
    public function collectionLCDoanHoatDong()
    {
        return LCDoanHoatDongResource::collection(LCDoanHoatDong::paginate(25));
    }

    public function storeLCDoanHoatDong(StoreLCDoanHoatDongRequest $request)
    {
        return new LCDoanHoatDongResource(LCDoanHoatDong::create($request->all()));
    }

    public function updateLCDoanHoatDong(UpdateLCDoanHoatDongRequest $request, LCDoanHoatDong $lcdoanhoatdong)
    {
        $lcdoanhoatdong->update($request->all());

        return new LCDoanHoatDongResource($lcdoanhoatdong);
    }

    public function deleteLCDoanHoatDong(LCDoanHoatDong $lcdoanhoatdong)
    {
      $lcdoanhoatdong->delete();

      return response()->json(null, 204);
    }
}
