<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetRecipeCountRequest;
use App\Http\Requests\GetRecipeRequest;
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

    /**
     * Get all recipe count.
     * @param GetRecipeCountRequest $oRequest
     * @return JsonResponse
     */
    public function getRecipeCount(GetRecipeCountRequest $oRequest): JsonResponse
    {
        return response()->json($this->oRecipeService->getRecipeCount($oRequest)->get());
    }

    /**
     * Get all recipe.
     * @param GetRecipeRequest $oRequest
     * @return JsonResponse
     */
    public function getRecipe(GetRecipeRequest $oRequest): JsonResponse
    {
        return response()->json($this->oRecipeService->getRecipe($oRequest)->get());
    }

    /**
     * Get a recipe.
     * @param string $sSlugName
     * @return JsonResponse
     */
    public function getRecipeBySlugName(string $sSlugName): JsonResponse
    {
        return response()->json($this->oRecipeService->getRecipeBySlugName($sSlugName)->get());
    }
}
