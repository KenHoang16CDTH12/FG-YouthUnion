<?php

namespace App\Repositories;

use App\Lop;
use Illuminate\Http\Request;
use App\Http\Resources\LopResource;
use App\Http\Requests\StoreLopRequest;
use App\Http\Requests\UpdateLopRequest;

class LopRepository
{
    /**
     * Get all of the lops for a given lop.
     *
     * @return Collection
     */
    public function collectionLop()
    {
        return LopResource::collection(Lop::paginate(25));
    }

    public function storeLop(StoreLopRequest $request)
    {
        return new LopResource(Lop::create($request->all()));
    }

    public function updateLop(UpdateLopRequest $request, Lop $lop)
    {
        $user->update($request->all());

        return new LopResource($lop);
    }

    public function deleteLop(Lop $lop)
    {
      $user->delete();

      return response()->json(null, 204);
    }
}
