<?php

namespace App\Repositories;

use App\Models\HoatDongType;
use App\Repositories\Contracts\HoatDongTypeRepository;

class HoatDongTypeRepositoryEloquent extends BaseRepositoryEloquent implements HoatDongTypeRepository {

    public function __construct()
    {
        $this->model = app(HoatDongType::class);
    }
}
