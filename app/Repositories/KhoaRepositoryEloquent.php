<?php

namespace App\Repositories;

use App\Models\Khoa;
use App\Repositories\Contracts\KhoaRepository;

class KhoaRepositoryEloquent extends BaseRepositoryEloquent implements KhoaRepository {

    public function __construct()
    {
        $this->model = app(Khoa::class);
    }
}
