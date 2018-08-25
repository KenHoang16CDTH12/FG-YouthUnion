<?php

namespace App\Http\Controllers\Api;

use App\HoatDong;
use Illuminate\Http\Request;
use App\Repositories\HoatDongRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHoatDongRequest;
use App\Http\Requests\UpdateHoatDongRequest;

class HoatDongController extends Controller
{
    /**
     * The User repository instance.
     *
     * @var HoatDongRepository
     */
    protected $hoatdongs;


    /**
     * Create a new controller instance.
     *
     * @param  HoatDongRepository  $hoatdongs
     * @return void
     */
    public function __construct(HoatDongRepository $hoatdongs)
    {
        $this->hoatdongs = $hoatdongs;
    }

    public function index()
    {
        return $this->hoatdongs->collectionHoatDong();
    }

    public function store(StoreHoatDongRequest $request)
    {
        return $this->hoatdongs->storeHoatDong($request);
    }

    public function show(HoatDong $hoatdong)
    {
      return new HoatDongResource($hoatdong);
    }

    public function update(UpdateHoatDongRequest $request, HoatDong $hoatdong)
    {
        return $this->hoatdongs->updateHoatDong($request, $hoatdong);
    }

    public function destroy(HoatDong $hoatdong)
    {
        return $this->hoatdongs->deleteHoatDong($hoatdong);
    }
}
