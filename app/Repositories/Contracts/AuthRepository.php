<?php
namespace App\Repositories\Contracts;
interface AuthRepository{
    public function login();
    public function logout();
}