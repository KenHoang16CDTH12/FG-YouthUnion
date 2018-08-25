<?php

namespace App\Http\Controllers\Api;

use App\NamHoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\NamHocRepository;
use App\Http\Requests\UpdateNamHocRequest; 
use App\Http\Requests\StoreNamHocRequest;

class NamHocController extends Controller
{
   /**
     * The Namhoc repository instance.
     *
     * @var NamHocRepository
     */
    protected $namhocs;


    /**
     * Create a new controller instance.
     *
     * @param  NamHocRepository  $namhocs
     * @return void
     */
    public function __construct(NamHocRepository $namhocs)
    {
        $this->namhocs = $namhocs;
    }

    public function index()
    {
        return $this->namhocs->collectionNamHoc();
    }

    public function store(StoreNamHocRequest $request)
    {
        return $this->namhocs->storeNamHoc($request);
    }

    public function show(NamHoc $namhoc)
    {
      return new NamHocResource($namhoc);
    }

    public function update(UpdateNamHocRequest $request, NamHoc $namhoc)
    {
        return $this->namhocs->updateNamHoc($request, $namhoc);
    }

    public function destroy(NamHoc $namhoc)
    {
        return $this->namhocs->deleteNamHoc($namhoc);
    }
}
