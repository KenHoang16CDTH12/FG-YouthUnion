<?php

namespace App\Repositories;

use App\Models\LCDoanHoatDong;
use App\Repositories\Contracts\LCDoanHoatDongRepository;

class LCDoanHoatDongRepositoryEloquent extends BaseRepositoryEloquent implements LCDoanHoatDongRepository {

    public function __construct()
    {
        $this->model = app(LCDoanHoatDong::class);
    }
}
