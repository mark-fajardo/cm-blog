<?php

namespace App\Services;

use App\Libraries\DBUtils;
use App\Repository\TimelineRepository;
use Illuminate\Http\Request;

/**
 * TimelineService
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class TimelineService extends Service
{
    /**
     * Contains timeline repository
     * @var TimelineRepository
     */
    private $oTimelineRepository;

    /**
     * TimelineService constructor
     * @param TimelineRepository $oTimelineRepository
     */
    public function __construct(TimelineRepository $oTimelineRepository)
    {
        $this->oTimelineRepository = $oTimelineRepository;
    }

    /**
     * Get timeline.
     * @param Request $oRequest
     * @return TimelineService
     */
    public function getTimeline(Request $oRequest): TimelineService
    {
        $this->request($oRequest);
        $aTimeline = $this->oTimelineRepository->getTimeline($this->aRequest);
        return $this->validateResponse($aTimeline, $this);
    }
}
