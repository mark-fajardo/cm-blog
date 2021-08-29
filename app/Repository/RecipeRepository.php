<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\Recipe;

/**
 * RecipeRepository
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class RecipeRepository extends Repository
{
    /**
     * Get promoted recipe.
     * @return array
     */
    public function getPromotedRecipe(): array
    {
        return $this->parseFirstData(Recipe::select(AppConstants::PROMOTED_FIELDS)
            ->where(AppConstants::PROMOTED_STATUS, 1)
            ->where(AppConstants::STATUS, 1)
            ->get()
        );
    }

    /**
     * Get all recommended recipes.
     * @return array
     */
    public function getRecommendedRecipes(): array
    {
        return $this->parseData(Recipe::select(AppConstants::RECOMMENDED_FIELDS)
            ->where(AppConstants::RECOMMEND_STATUS, 1)
            ->where(AppConstants::STATUS, 1)
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->orderBy(AppConstants::UPDATED_AT, AppConstants::DESC)
            ->get()
        );
    }

    /**
     * Get all recommended video recipes.
     * @return array
     */
    public function getRecommendedVideoRecipes(): array
    {
        return $this->parseData(Recipe::select(AppConstants::RECOMMENDED_VIDEO_FIELDS)
            ->where(AppConstants::RECOMMEND_VIDEO_STATUS, 1)
            ->where(AppConstants::STATUS, 1)
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->orderBy(AppConstants::UPDATED_AT, AppConstants::DESC)
            ->get()
        );
    }

    /**
     * Get recipe count.
     * @param array $aRequest
     * @return array
     */
    public function getRecipeCount(array $aRequest): array
    {
        return [
            AppConstants::COUNT => Recipe::where(AppConstants::STATUS, 1)
                ->where(AppConstants::RECIPE_NAME, 'LIKE', '%' . $aRequest[AppConstants::SEARCH_KEYWORD] . '%')
                ->count()
        ];
    }

    /**
     * Get recipe.
     * @param array $aRequest
     * @return array
     */
    public function getRecipe(array $aRequest): array
    {
        return $this->parseData(Recipe::select(AppConstants::RECIPE_LIST_FIELDS)
            ->where(AppConstants::STATUS, 1)
            ->where(AppConstants::RECIPE_NAME, 'LIKE', '%' . $aRequest[AppConstants::SEARCH_KEYWORD] . '%')
            ->skip($aRequest[AppConstants::OFFSET])
            ->take($aRequest[AppConstants::LIMIT])
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->get()
        );
    }
}
