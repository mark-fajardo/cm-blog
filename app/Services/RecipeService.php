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
     * @return RecipeService
     */
    public function promotedRecipe(): RecipeService
    {
        $aPromotedRecipe = $this->oRecipeRepository->getPromotedRecipe();
        if (empty($aPromotedRecipe) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, $aPromotedRecipe);
        return $this;
    }

    /**
     * Get all recommended recipes.
     * @return RecipeService
     */
    public function recommendedRecipes(): RecipeService
    {
        $aRecommendedRecipes = $this->oRecipeRepository->getRecommendedRecipes();
        if (empty($aRecommendedRecipes) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, $aRecommendedRecipes);
        return $this;
    }

    /**
     * Get all recommended video recipes.
     * @return RecipeService
     */
    public function recommendedVideoRecipes(): RecipeService
    {
        $aRecommendedVideoRecipes = $this->oRecipeRepository->getRecommendedVideoRecipes();
        if (empty($aRecommendedVideoRecipes) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $this;
        }

        $this->aResponse = DBUtils::formatResponse(true, $aRecommendedVideoRecipes);
        return $this;
    }
}
