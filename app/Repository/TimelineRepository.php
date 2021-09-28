<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\Recipe;

/**
 * TimelineRepository
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.07
 */
class TimelineRepository extends Repository
{
    /**
     * Get timeline.
     * @param array $aRequest
     * @return array
     */
    public function getTimeline(array $aRequest): array
    {
        return $this->parseData(Recipe::select(AppConstants::TIMELINE_FIELDS)
            ->where(AppConstants::STATUS, 1)
            ->skip($aRequest[AppConstants::OFFSET])
            ->take($aRequest[AppConstants::LIMIT])
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->get()
        );
    }
}
