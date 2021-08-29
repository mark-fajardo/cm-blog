<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageConfigRequest;
use App\Services\PageConfigService;
use Illuminate\Http\JsonResponse;

/**
 * Contains page config controller methods.
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class PageConfigController extends Controller
{
    /**
     * Contains page config service instance.
     * @var PageConfigService
     */
    private $oPageConfigService;

    /**
     * PageConfigController constructor
     * @param PageConfigService $oPageConfigService
     */
    public function __construct(PageConfigService $oPageConfigService)
    {
        $this->oPageConfigService = $oPageConfigService;
    }

    /**
     * Get page config method.
     * @param PageConfigRequest $oRequest
     * @return JsonResponse
     */
    public function getPageConfig(PageConfigRequest $oRequest): JsonResponse
    {
        return response()->json($this->oPageConfigService->pageConfig($oRequest)->get());
    }
}
