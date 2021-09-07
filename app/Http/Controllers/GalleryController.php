<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetGalleryRequest;
use App\Services\GalleryService;
use Illuminate\Http\JsonResponse;

/**
 * GalleryController
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class GalleryController extends Controller
{
    /**
     * Contains page gallery service instance.
     * @var GalleryService
     */
    private $oGalleryService;

    /**
     * GalleryController constructor
     * @param GalleryService $oGalleryService
     */
    public function __construct(GalleryService $oGalleryService)
    {
        $this->oGalleryService = $oGalleryService;
    }

    /**
     * Get gallery images.
     * @param GetGalleryRequest $oRequest
     * @return JsonResponse
     */
    public function getGalleryImages(GetGalleryRequest $oRequest): JsonResponse
    {
        return response()->json($this->oGalleryService->getGalleryImages($oRequest)->get());
    }
}
