<?php
namespace App\Repositories\Contracts;

use App\Http\Resources\UserCollection;
use App\Models\User;
//use App\Http\Resources\UserResource;
class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepository{
  public function __construct()
  {
      $this->model  = app(User::class);
      $this->resouceCollection = UserCollection::class;
  }
}