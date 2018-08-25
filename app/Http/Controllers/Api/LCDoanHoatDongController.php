<?php

namespace App\Http\Controllers\Api;

use App\LCDoanHoatDong;
use Illuminate\Http\Request;
use App\Repositories\LCDoanHoatDongRepository;
use App\Http\Requests\StoreLCDoanHoatDongRequest;
use App\Http\Requests\UpdateLCDoanHoatDongRequest;
use App\Http\Controllers\Controller;

class LCDoanHoatDongController extends Controller
{

    //LCDoanHoatDongRepository's instance
    protected $lcdoanhoatdongs;

    public function __construct(LCDoanHoatDongRepository $lcdoanhoatdongs)
    {
        $this->lcdoanhoatdongs = $lcdoanhoatdongs;
    }

    public function index()
    {
        return $this->lcdoanhoatdongs->collectionLCDoanHoatDong();
    }

    public function store(StoreLCDoanHoatDongRequest $request)
    {
        return $this->lcdoanhoatdongs->storeLCDoanHoatDong($request);
    }

    public function show(LCDoanHoatDong $lcdoanhoatdongs)
    {
        return new LCDoanHoatDongResource($lcdoanhoatdongs);
    }

    public function update(UpdateLCDoanHoatDongRequest $request, LCDoanHoatDong $lcdoanhoatdongs)
    {
       return $this->lcdoanhoatdongs->updateLCDoanHoatDong($request, $lcdoanhoatdongs);
    }

    public function destroy(LCDoanHoatDong $lcdoanhoatdongs)
    {
        return $this->lcdoanhoatdongs->deleteLCDoanHoatDong($lcdoanhoatdongs);
    }
}
