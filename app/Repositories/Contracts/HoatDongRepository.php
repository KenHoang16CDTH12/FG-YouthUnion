<?php

namespace App\Repositories\Contracts;

interface HoatDongRepository{

    public function paginateCommingUp($perPage, $sort);

    public function paginateCommingUpSearch($perPage, $sort, $searchText);

    public function paginateHappening($perPage, $sort);

    public function paginateHappeningSearch($perPage, $sort, $searchText);

    public function paginateFinished($perPage, $sort);

    public function paginateFinishedSearch($perPage, $sort, $searchText);

}
