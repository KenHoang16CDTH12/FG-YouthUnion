<?php

namespace App\Repositories;

use App\Models\Role;
use App\Http\Resources\RoleResource;

class RoleRepository
{
     /**
     * Get all roles.
     *
     * @return list
     */
    public function roles()
    {
        // Return collection of objects as a resource
        return RoleResource::collection(Role::orderBy('created_at', 'desc')->get());
    }
}
