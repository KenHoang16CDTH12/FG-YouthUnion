<?php

namespace App\Http\Controllers\Api;

use App\LCDoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LCDoanRepository;
use App\Http\Requests\StoreLCDoanRequest;
use App\Http\Requests\UpdateLCDoanRequest;

class LCDoanController extends Controller
{
    
    /**
     * The User repository instance.
     *
     * @var LCDoanRepository
     */
    protected $lcdoan;


    /**
     * Create a new controller instance.
     *
     * @param  LCDoanRepository  $lcdoan
     * @return void
     */
    public function __construct(LCDoanRepository $lcdoan)
    {
        $this->lcdoan = $lcdoan;
    }

    public function index()
    {
        return $this->lcdoan->collectionLCDoan();
    }

    public function store(StoreLCDoanRequest $request)
    {
        return $this->lcdoan->storeLCDoan($request);
    }

    public function show(LCDoan $lcd)
    {
      return new LCDoanResource($lcd);
    }

    public function update(UpdateLCDoanRequest $request, LCDoan $lcd)
    {
        return $this->lcdoan->updateLCDoan($request, $lcd);
    }

    public function destroy(LCDoan $lcd)
    {
        return $this->lcdoan->deleteLCDoan($lcd);
    }
}
