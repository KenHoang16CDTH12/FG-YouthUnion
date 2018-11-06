<?php

namespace App\Repositories\Contracts;

interface UserRepository {

    public function showDetail($id);

    public function toLop($id);

    public function toKhoa($id);

    public function toLCD($id);

    public function usersOfLCD($idLCD, $entries, $sort);

}
