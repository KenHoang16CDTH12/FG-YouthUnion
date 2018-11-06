<?php

namespace App\Repositories;

use App\Models\Lop;
use App\Repositories\Contracts\LopRepository;

class LopRepositoryEloquent extends BaseRepositoryEloquent implements LopRepository {

    public function __construct()
    {
        $this->model = app(Lop::class);
    }
}
