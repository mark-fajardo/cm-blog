<?php

namespace App\Services;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use App\Libraries\FileUtils;
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

        $aJsonConfig = $this->assignImage($sPageConfig);
        $this->aResponse = DBUtils::formatResponse(true, $aJsonConfig);
        return $this;
    }

    /**
     * Assign image URLs for landscape and portrait slider images.
     * @param string $sPageConfig
     * @return array
     */
    private function assignImage(string $sPageConfig): array
    {
        $aJsonConfig = json_decode($sPageConfig, true);
        $oFileUtils = new FileUtils();
        $aLandscapeImages = $oFileUtils->assignMultipleURL(data_get($aJsonConfig, 'sliders.*.image_url', []));
        $aPortraitImages = $oFileUtils->assignMultipleURL(data_get($aJsonConfig, 'sliders.*.image_url_portrait', []));
        data_set($aJsonConfig, 'mini_about.img', $oFileUtils->assignMultipleURL(data_get($aJsonConfig, 'mini_about.img', [])));
        foreach ($aJsonConfig['sliders'] as $iKey => $sValue) {
            data_set($aJsonConfig['sliders'], $iKey . '.image_url', data_get($aLandscapeImages, $iKey, ''));
            data_set($aJsonConfig['sliders'], $iKey . '.image_url_portrait', data_get($aPortraitImages, $iKey, ''));
        }

        return $aJsonConfig;
    }
}
