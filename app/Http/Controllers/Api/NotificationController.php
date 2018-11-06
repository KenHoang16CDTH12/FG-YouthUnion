<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\Contracts\NotificationRepository;
use App\Http\Requests\NotificationStoreRequest;

class NotificationController extends Controller
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
        $this->respository = app(NotificationRepository::class);
    }

    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function index()
    {
        if (Input::has('user_id')) {
            $entries = Input::has('entries') ? Input::get('entries') : 10;
            if (Input::has('searchText')) {
                return  $this->respository->paginateNotifySearch(Input::get('user_id'), $entries, Input::get('searchText'), Input::get('sort'));
            }
            return $this->respository->paginateNotify(Input::get('user_id'), $entries, Input::get('sort'));
        }
        return response()->json(null, 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Input::has('user_id'))
            return $this->respository->showNotify(Input::get('user_id'), $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationStoreRequest $request)
    {
        $request->validated();
        return $this->respository->create($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $user_id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Input::has('user_id'))
            return $this->respository->destroyNotify(Input::get('user_id'), $id);
    }



    /**
     * Remove all notification by user_idstorage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        if (Input::has('user_id'))
            return $this->respository->clearNotify(Input::get('user_id'));
    }
}
