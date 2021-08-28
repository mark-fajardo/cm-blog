<?php

namespace App\Services;

use App\Libraries\DBUtils;
use App\Repository\RecipeRepository;

/**
 * RecipeService
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class RecipeService extends Service
{
    /**
     * Contains page recipe repository
     * @var RecipeRepository
     */
    private $oRecipeRepository;

    /**
     * RecipeService constructor
     * @param RecipeRepository $oRecipeRepository
     */
    public function __construct(RecipeRepository $oRecipeRepository)
    {
        $this->oRecipeRepository = $oRecipeRepository;
    }

    /**
     * Get promoted recipe.
     * @return array
     */
    public function getPromotedRecipe(): array
    {
        $aPromotedRecipe = $this->oRecipeRepository->getPromotedRecipe();
        if (empty($aPromotedRecipe) === true) {
            return DBUtils::formatResponse(false);
        }

        return DBUtils::formatResponse(true, $aPromotedRecipe);
    }

    /**
     * Get all recommended recipes.
     * @return array
     */
    public function getRecommendedRecipes(): array
    {
        $aRecommendedRecipes = $this->oRecipeRepository->getRecommendedRecipes();
        if (empty($aRecommendedRecipes) === true) {
            return DBUtils::formatResponse(false);
        }

        return DBUtils::formatResponse(true, $aRecommendedRecipes);
    }

    /**
     * Get all recommended video recipes.
     * @return array
     */
    public function getRecommendedVideoRecipes(): array
    {
        $aRecommendedVideoRecipes = $this->oRecipeRepository->getRecommendedVideoRecipes();
        if (empty($aRecommendedVideoRecipes) === true) {
            return DBUtils::formatResponse(false);
        }

        return DBUtils::formatResponse(true, $aRecommendedVideoRecipes);
    }
}
