<?php

namespace App\Repositories;

use App\Khoa;
use Illuminate\Http\Request;
use App\Http\Resources\KhoaResource;
use App\Http\Requests\StoreKhoaRequest;
use App\Http\Requests\UpdateKhoaRequest;

class KhoaRepository
{
    /**
     * Get all of the Khoas for a given Khoa.
     *
     * @return Collection
     */
    public function collectionKhoa()
    {
        return KhoaResource::collection(Khoa::paginate(25));
    }

    public function storeKhoa(StoreKhoaRequest $request)
    {
        return new KhoaResource(Khoa::create($request->all()));
    }

    public function updateKhoa(UpdateKhoaRequest $request, Khoa $Khoa)
    {
        $Khoa->update($request->all());

        return new KhoaResource($Khoa);
    }

    public function deleteKhoa(Khoa $Khoa)
    {
      $Khoa->delete();

      return response()->json(null, 204);
    }
}
