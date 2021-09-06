<?php

namespace App\Services;

use App\Libraries\DBUtils;
use App\Repository\GalleryRepository;
use Illuminate\Http\Request;

/**
 * GalleryService
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class GalleryService extends Service
{
    /**
     * Contains gallery repository
     * @var GalleryRepository
     */
    private $oGalleryRepository;

    /**
     * GalleryService constructor
     * @param GalleryRepository $oGalleryRepository
     */
    public function __construct(GalleryRepository $oGalleryRepository)
    {
        $this->oGalleryRepository = $oGalleryRepository;
    }

    /**
     * Get gallery images.
     * @return $this
     */
    public function getGalleryImages(Request $oRequest): GalleryService
    {
        $this->request($oRequest);
        $aGalleryImages = $this->oGalleryRepository->getGalleryImages($this->aRequest);
        if (empty($aGalleryImages) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, [
            'images'  => data_get($aGalleryImages, '*.image_url'),
            'gallery' => $aGalleryImages
        ]);
        return $this;
    }
}
