<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\Contracts\UserHoatDongRepository;
use App\Http\Requests\UserHoatDongStoreRequest;
use App\Http\Requests\UserHoatDongUpdateRequest;

class UserHoatDongController extends Controller
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
        $this->respository = app(UserHoatDongRepository::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function attendance(UserHoatDongStoreRequest $request)
    {
        $request->validated();
        return $this->respository->attendance($request);
    }

    /**
     * Collect Joined.
     *
     * @return Collection
     */
    public function paginateJoined($id)
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        return $this->respository->paginateJoined($id, $entries, Input::get('sort'));
    }

    /**
     * Collect HoatDongId.
     *
     * @return Collection
     */
    public function paginateNotJoiner($id)
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        return $this->respository->paginateNotJoiner($id, $entries, Input::get('sort'));
    }

    /**
     * Collect HoatDongId.
     *
     * @return Collection
     */
    public function paginateHoatDongId($id)
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        return $this->respository->paginateHoatDongId($id, $entries, Input::get('sort'));
    }
}
