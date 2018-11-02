<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
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
    public function __construct(UserRepository $respository)
    {
        $this->respository = $respository;
    }

    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function index()
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        if (Input::has('searchText'))
            return  $this->respository->collectionSearch($entries, Input::get('searchText'), Input::get('sort'));
        return $this->respository->collection($entries, Input::get('sort'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respository->show($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request->validated();
        return $this->respository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $request->validated();
        return $this->respository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respository->destroy($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetail($id)
    {
        return $this->respository->showDetail($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toLop($id)
    {
        return $this->respository->toLop($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toKhoa($id)
    {
        return $this->respository->toKhoa($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toLCD($id)
    {
        return $this->respository->toLCD($id);
    }

    /**
     *  List users of LCD.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usersOfLCD($idLCD)
    {
        $entries = Input::has('entries') ? Input::get('entries') : 10;
        return $this->respository->usersOfLCD($idLCD, $entries, Input::get('sort'));
    }
}
