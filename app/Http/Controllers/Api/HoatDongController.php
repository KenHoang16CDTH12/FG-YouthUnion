<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\Contracts\HoatDongRepository;
use App\Http\Requests\HoatDongStoreRequest;
use App\Http\Requests\HoatDongUpdateRequest;

class HoatDongController extends Controller
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
        $this->respository = app(HoatDongRepository::class);
    }

    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function index()
    {

        $perPage = Input::has('entries') ? Input::get('entries') : 10;
        if (Input::has('searchText'))
            return $this->respository->paginateSearch($perPage, Input::get('sort'), Input::get('searchText'));
        return $this->respository->paginate($perPage, Input::get('sort'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respository->find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoatDongStoreRequest $request)
    {
        $request->validated();
        return $this->respository->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update(HoatDongUpdateRequest $request, $id)
    {
        $request->validated();
        return $this->respository->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respository->delete($id);
    }

    /**
     * Get comming up of the objects for a given model.
     *
     * @return Collection
     */
    public function indexComingUp()
    {
        $perPage = Input::has('entries') ? Input::get('entries') : 10;
        if (Input::has('searchText'))
            return $this->respository->paginateCommingUpSearch($perPage, Input::get('sort'), Input::get('searchText'));
        return $this->respository->paginateCommingUp($perPage, Input::get('sort'));
    }

    /**
     * Get happenning of the objects for a given model.
     *
     * @return Collection
     */
    public function indexHappening()
    {
        $perPage = Input::has('entries') ? Input::get('entries') : 10;
        if (Input::has('searchText'))
            return $this->respository->paginateHappeningSearch($perPage, Input::get('sort'), Input::get('searchText'));
        return $this->respository->paginateHappening($perPage, Input::get('sort'));
    }

    /**
     * Get finished of the objects for a given model.
     *
     * @return Collection
     */
    public function indexFinished()
    {
        $perPage = Input::has('entries') ? Input::get('entries') : 10;
        if (Input::has('searchText'))
            return $this->respository->paginateFinishedSearch($perPage, Input::get('sort'), Input::get('searchText'));
        return $this->respository->paginateFinished($perPage, Input::get('sort'));
    }
}
