<?php

namespace App\Services;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use App\Repository\PageConfigRepository;
use Illuminate\Http\Request;

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
     * @param Request $oRequest
     * @return PageConfigService
     */
    public function pageConfig(Request $oRequest): PageConfigService
    {
        $this->request($oRequest);
        $aPageConfig = $this->oPageConfigRepository->getPageConfig($this->aRequest);
        if (empty($aPageConfig) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $sPageConfig = data_get($aPageConfig, AppConstants::PAGE_CONFIG_JSON, '');
        if (empty($sPageConfig) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, json_decode($sPageConfig, true));
        return $this;
    }
}
