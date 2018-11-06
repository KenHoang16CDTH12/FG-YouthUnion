<?php

namespace App\Repositories\Contracts;

interface AuthRepository{

    public function login($request);

    public function logout($request);

    public function user($request);
}
