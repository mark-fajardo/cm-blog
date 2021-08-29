<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

/**
 * CategoryController
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.29
 */
class CategoryController extends Controller
{
    /**
     * Contains page category service instance.
     * @var CategoryService
     */
    private $oCategoryService;

    /**
     * CategoryController constructor
     * @param CategoryService $oCategoryService
     */
    public function __construct(CategoryService $oCategoryService)
    {
        $this->oCategoryService = $oCategoryService;
    }

    /**
     * Get all categories
     * @return JsonResponse
     */
    public function getAllCategories(): JsonResponse
    {
        return response()->json($this->oCategoryService->getAllCategories()->get());
    }
}
