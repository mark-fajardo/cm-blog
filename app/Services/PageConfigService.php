<?php

namespace App\Services;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use App\Repository\PageConfigRepository;

/**
 * Contains page config service methods.
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class PageConfigService extends Service
{
    /**
     * Contains page config repository
     * @var PageConfigRepository
     */
    private $oPageConfigRepository;

    /**
     * PageConfigService constructor
     * @param PageConfigRepository $oPageConfigRepository
     */
    public function __construct(PageConfigRepository $oPageConfigRepository)
    {
        $this->oPageConfigRepository = $oPageConfigRepository;
    }

    /**
     * Get page config only.
     * @param array $aRequest
     * @return array
     */
    public function getPageConfig(array $aRequest): array
    {
        $aPageConfig = $this->oPageConfigRepository->getPageConfig($aRequest);
        if (empty($aPageConfig) === true) {
            return DBUtils::formatResponse(false);
        }

        $sPageConfig = data_get($aPageConfig, AppConstants::PAGE_CONFIG_JSON, '');
        if (empty($sPageConfig) === true) {
            return DBUtils::formatResponse(false);
        }

        return DBUtils::formatResponse(true, json_decode($sPageConfig, true));
    }
}