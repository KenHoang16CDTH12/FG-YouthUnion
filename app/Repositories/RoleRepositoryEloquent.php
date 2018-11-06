<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepository;

class RoleRepositoryEloquent extends BaseRepositoryEloquent implements RoleRepository {

    public function __construct()
    {
        $this->model = app(Role::class);
    }
}
