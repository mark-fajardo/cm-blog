<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\PageConfig;

/**
 * Contains page config service methods.
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class PageConfigRepository extends Repository
{
    /**
     * Get the page config only of the selected page tag.
     * @param array $aRequest
     * @return array
     */
    public function getPageConfig(array $aRequest): array
    {
        return $this->parseFirstData(PageConfig::select(AppConstants::PAGE_CONFIG_JSON)
            ->where(AppConstants::PAGE_TAG, $aRequest[AppConstants::PAGE_TAG])
            ->get());
    }
}
