<?php

namespace App\Repositories\Contracts;

interface NotificationRepository {

    public function paginateNotify($user_id, $perPage, $sort);

    public function paginateNotifySearch($user_id, $perPage, $searchText, $sort);

    public function showNotify($user_id, $id);

    public function destroyNotify($user_id, $id);

    public function clearNotify($user_id);
}
