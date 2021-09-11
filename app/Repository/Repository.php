<?php

namespace App\Repository;

use App\Constants\AppConstants;
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

    /**
     * Get search keyword.
     * @param array $aRequest
     * @return string
     */
    protected function getSearchKeyword(array $aRequest): string
    {
        return $this->wrapLike(strtolower($aRequest[AppConstants::SEARCH_KEYWORD]));
    }

    /**
     * Wrap string with LIKE % operator.
     * @param string $sSearchKeyword
     * @return string
     */
    protected function wrapLike(string $sSearchKeyword): string
    {
        return '%' . $sSearchKeyword . '%';
    }

    /**
     * Get where raw like operator with field.
     * @param string $sField
     * @return string
     */
    protected function getRawLikeLower(string $sField): string
    {
        return 'LOWER(' . $sField . ') LIKE ?';
    }
}
