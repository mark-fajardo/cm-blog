<?php

namespace App\Http\Controllers;

use App\Services\RecipeService;
use Illuminate\Http\JsonResponse;

/**
 * RecipeController
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class RecipeController extends Controller
{
    /**
     * Contains page recipe service instance.
     * @var RecipeService
     */
    private $oRecipeService;

    /**
     * RecipeController constructor
     * @param RecipeService $oRecipeService
     */
    public function __construct(RecipeService $oRecipeService)
    {
        $this->oRecipeService = $oRecipeService;
    }

    /**
     * Get promoted recipe.
     * @return JsonResponse
     */
    public function getPromotedRecipe(): JsonResponse
    {
        return response()->json($this->oRecipeService->promotedRecipe()->get());
    }

    /**
     * Get all recommended recipes.
     * @return JsonResponse
     */
    public function getRecommendedRecipes(): JsonResponse
    {
        return response()->json($this->oRecipeService->recommendedRecipes()->get());
    }

    /**
     * Get all recommended video recipes.
     * @return JsonResponse
     */
    public function getRecommendedVideoRecipes(): JsonResponse
    {
        return response()->json($this->oRecipeService->recommendedVideoRecipes()->get());
    }
}
