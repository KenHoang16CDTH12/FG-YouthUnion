<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\UserHoatDongRepository;
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
    public function __construct(UserHoatDongRepository $respository)
    {
        $this->respository = $respository;
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
    public function collectionJoined($id)
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        return $this->respository->collectionJoined($id, $entries, Input::get('sort'));
    }
}
