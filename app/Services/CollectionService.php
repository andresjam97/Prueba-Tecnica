<?php
namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Contracts\CollectionPaginator;

class CollectionService implements CollectionPaginator
{
    public function pagination(Collection $data):LengthAwarePaginator
    {
        $currentPage = request('page') ?: (Paginator::resolveCurrentPage() ?: 1);
        $perPage = 10;
        $items = $data->forPage($currentPage, $perPage);
        $totalResults = $data->count();

        return new LengthAwarePaginator(
            $items,
            $totalResults,
            $perPage,
            $currentPage,
            // Esta parte (options) la copie de lo que hace por defecto el paginador de Laravel haciendo un dd()
            [
                'path' => url()->current(),
                'pageName' => 'page',
            ]
        );
    }
}
