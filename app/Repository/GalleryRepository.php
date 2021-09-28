<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\Gallery;

/**
 * GalleryRepository
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class GalleryRepository extends Repository
{
    /**
     * Get gallery images by offset and limit.
     * @param array $aRequest
     * @return array
     */
    public function getGalleryImages(array $aRequest): array
    {
        return $this->parseData(Gallery::with('recipe:slug_name,id')
            ->where(AppConstants::STATUS, 1)
            ->skip($aRequest[AppConstants::OFFSET])
            ->take($aRequest[AppConstants::LIMIT])
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->get(AppConstants::GALLERY_FIELDS)
        );
    }
}
