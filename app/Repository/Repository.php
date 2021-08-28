<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

/**
 * Base Repository class
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class Repository
{
    /**
     * Parse first data or return empty if none.
     * @param Collection $oCollection
     * @return array
     */
    protected function parseFirstData(Collection $oCollection): array
    {
        return data_get($oCollection->toArray(), '0', []);
    }
    /**
     * Parse first data or return empty if none.
     * @param Collection $oCollection
     * @return array
     */
    protected function parseData(Collection $oCollection): array
    {
        return $oCollection->toArray();
    }
}
