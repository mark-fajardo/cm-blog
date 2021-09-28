<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTimelineRequest;
use App\Services\TimelineService;
use Illuminate\Http\JsonResponse;

/**
 * TimelineController
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.07
 */
class TimelineController extends Controller
{
    /**
     * Contains page timeline service instance.
     * @var TimelineService
     */
    private $oTimelineService;

    /**
     * TimelineController constructor
     * @param TimelineService $oTimelineService
     */
    public function __construct(TimelineService $oTimelineService)
    {
        $this->oTimelineService = $oTimelineService;
    }

    /**
     * Get timeline.
     * @param GetTimelineRequest $oRequest
     * @return JsonResponse
     */
    public function getTimeline(GetTimelineRequest $oRequest): JsonResponse
    {
        return response()->json($this->oTimelineService->getTimeline($oRequest)->get());
    }
}
