<?php

namespace App\Http\Controllers\Api;

use App\Khoa;
use Illuminate\Http\Request;
use App\Repositories\KhoaRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKhoaRequest;
use App\Http\Requests\UpdateKhoaRequest;

class KhoaController extends Controller
{
    /**
     * The Khoa repository instance.
     *
     * @var KhoaRepository
     */
    protected $Khoas;


    /**
     * Create a new controller instance.
     *
     * @param  KhoaRepository  $Khoas
     * @return void
     */
    public function __construct(KhoaRepository $Khoas)
    {
        $this->Khoas = $Khoas;
    }

    public function index()
    {
        return $this->Khoas->collectionKhoa();
    }

    public function store(StoreKhoaRequest $request)
    {
        return $this->Khoas->storeKhoa($request);
    }

    public function show(Khoa $Khoa)
    {
      return new KhoaResource($Khoa);
    }

    public function update(UpdateKhoaRequest $request, Khoa $Khoa)
    {
        return $this->Khoas->updateKhoa($request, $Khoa);
    }

    public function destroy(Khoa $Khoa)
    {
        return $this->Khoas->deleteKhoa($Khoa);
    }
}
