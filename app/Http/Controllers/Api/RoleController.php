<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{

    /**
     * The repository instance.
     *
     * @var ObjectRepository
     */
    protected $respository;


    /**
     * Create a new controller instance.
     *
     * @param  ObjectRepository  $objects
     * @return void
     */
    public function __construct(RoleRepository $respository)
    {
        $this->respository = $respository;
    }

    /**
     * Get all roles.
     *
     * @return list
     */
    public function roles()
    {
        return $this->respository->roles();
    }
}
