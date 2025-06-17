<?php

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

if (! function_exists('paginateHelper')) {
    /**
     * Paginate a Laravel collection for the current request.
     *
     * @param Collection $collection
     * @param int|null   $perPage
     * @param string     $pageName
     * @return LengthAwarePaginator
     */
    function paginateHelper(Collection $collection, $perPage = null, string $pageName = 'page'): LengthAwarePaginator
    {
        $perPage = $perPage ?: request()->rowsPerPage ?: 15;
        $page    = LengthAwarePaginator::resolveCurrentPage($pageName);
        $items   = $collection->forPage($page, $perPage)->values();

        return new LengthAwarePaginator(
            $items,
            $collection->count(),
            $perPage,
            $page,
            [
                'path'     => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
                'query'    => request()->query(),
            ]
        );
    }
}
