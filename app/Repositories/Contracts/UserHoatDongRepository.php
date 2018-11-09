<?php

namespace App\Repositories\Contracts;

interface UserHoatDongRepository {

    public function attendance($params);

    public function paginateJoined($user_id, $entries, $sort);

    public function paginateNotJoiner($hoatdong_id, $entries, $sort);

    public function paginateHoatDongId($hoatdong_id, $entries, $sort);
}
