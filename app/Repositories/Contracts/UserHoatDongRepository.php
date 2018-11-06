<?php

namespace App\Repositories\Contracts;

interface UserHoatDongRepository {

    public function attendance($params);

    public function collectionJoined($id, $entries, $sort);
}
