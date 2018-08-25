<?php

namespace App\Http\Controllers\Api;

use App\HocKy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\HocKyRepository;
use App\Http\Requests\StoreHocKyRequest;
use App\Http\Requests\UpdateHocKyRequest;

class HocKyController extends Controller
{
    /**
     * The HocKy repository instance.
     *
     * @var HocKyRepository
     */
    protected $hockys;


    /**
     * Create a new controller instance.
     *
     * @param  HocKyRepository  $hockys
     * @return void
     */
    public function __construct(HocKyRepository $hockys)
    {
        $this->hockys = $hockys;
    }

    public function index()
    {
        return $this->hockys->collectionHocKy();
    }

    public function store(StoreHocKyRequest $request)
    {
        return $this->hockys->storeHocKy($request);
    }

    public function show(HocKy $hocky)
    {
      return new HocKyResource($hocky);
    }

    public function update(UpdateHocKyRequest $request, HocKy $hocky)
    {
        return $this->hockys->updateHocKy($request, $hocky);
    }

    public function destroy(HocKy $hocky)
    {
        return $this->hockys->deleteHocKy($hocky);
    }
}
