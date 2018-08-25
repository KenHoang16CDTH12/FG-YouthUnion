<?php

namespace App\Http\Controllers\Api;

use App\HoatDongType;
use Illuminate\Http\Request;
use App\Repositories\HoatDongTypeRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHoatDongTypeRequest;
use App\Http\Requests\UpdateHoatDongTypeRequest;

class HoatDongTypeController extends Controller
{
    /**
     * The User repository instance.
     *
     * @var HoatDongTypeRepository
     */
    protected $hoatdongtypes;


    /**
     * Create a new controller instance.
     *
     * @param  HoatDongTypeRepository  $hoatdongtypes
     * @return void
     */
    public function __construct(HoatDongTypeRepository $hoatdongtypes)
    {
        $this->hoatdongtypes = $hoatdongtypes;
    }

    public function index()
    {
        return $this->hoatdongtypes->collectionHoatDongType();
    }

    public function store(StoreHoatDongTypeRequest $request)
    {
        return $this->hoatdongtypes->storeHoatDongType($request);
    }

    public function show(HoatDongType $hoatdongtype)
    {
      return new HoatDongTypeResource($hoatdongtype);
    }

    public function update(UpdateHoatDongTypeRequest $request, HoatDongType $hoatdongtype)
    {
        return $this->hoatdongtypes->updateHoatDongType($request, $hoatdongtype);
    }

    public function destroy(HoatDongType $hoatdongtype)
    {
        return $this->hoatdongtypes->deleteHoatDongType($hoatdongtype);
    }
}
