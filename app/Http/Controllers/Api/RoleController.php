<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\RoleRepository;

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
    public function __construct()
    {
        $this->respository = app(RoleRepository::class);
    }

    /**
     * Get all roles.
     *
     * @return list
     */
    public function all()
    {
        return $this->respository->all();
    }
}
