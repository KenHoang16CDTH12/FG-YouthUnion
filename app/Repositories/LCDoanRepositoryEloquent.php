<?php

namespace App\Repositories;

use App\Models\LCDoan;
use App\Repositories\Contracts\LCDoanRepository;

class LCDoanRepositoryEloquent extends BaseRepositoryEloquent implements LCDoanRepository {

    public function __construct()
    {
        $this->model = app(LCDoan::class);
    }
}
