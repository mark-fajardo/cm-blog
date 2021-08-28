<?php

namespace App\Repository;

use App\Constants\AppConstants;
use App\Models\Recipe;

/**
 * Contains page config service methods.
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
            ->get()
        );
    }
}
