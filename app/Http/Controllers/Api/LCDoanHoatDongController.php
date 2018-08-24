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
    protected $lcdoanhoatdong;

    public function __construct(LCDoanHoatDongRepository $lcdoanhoatdong)
    {
        $this->lcdoanhoatdong = $lcdoanhoatdong;
    }

    public function index()
    {
        return $this->lcdhd->collectionLCDoanHoatDong();
    }

    public function store(StoreLCDoanHoatDongRequest $request)
    {
        return $this->lcdoanhoatdong->storeLCDoanHoatDong($request);
    }

    public function show(LCDoanHoatDong $lcdoanhoatdong)
    {
        return new LCDoanHoatDongResource($lcdoanhoatdong);
    }

    public function update(UpdateLCDoanHoatDongRequest $request, LCDoanHoatDong $lcdoanhoatdong)
    {
       return $this->lcdoanhoatdong->updateLCDoanHoatDong($request, $lcdoanhoatdong);
    }

    public function destroy(LCDoanHoatDong $lcdoanhoatdong)
    {
        return $this->lcdoanhoatdong->deleteLCDoanHoatDong($lcdoanhoatdong);
    }
}
