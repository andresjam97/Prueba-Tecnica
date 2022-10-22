<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CollectionPaginator {

    public function pagination(Collection $collection):LengthAwarePaginator;
    
}
