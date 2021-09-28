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
        $sSearchKeyword = $this->getSearchKeyword($aRequest);
        $oCategoryRepository = new CategoryRepository();
        $sCategoryId = (string)data_get($oCategoryRepository->getCategoryByName($sSearchKeyword), '0.id', '');
        $oRecipe = Recipe::where(AppConstants::STATUS, 1)
            ->whereRaw($this->getRawLikeLower(AppConstants::RECIPE_NAME), $sSearchKeyword)
            ->orWhereRaw($this->getRawLikeLower(AppConstants::INGREDIENTS_JSON), $sSearchKeyword);
        if (empty($sCategoryId) === false) {
            $oRecipe = $oRecipe->orWhereRaw($this->getRawLikeLower(AppConstants::CATEGORY_JSON), $this->wrapLike($sCategoryId));
        }

        return [
            AppConstants::COUNT => $oRecipe->count()
        ];
    }

    /**
     * Get recipe.
     * @param array $aRequest
     * @return array
     */
    public function getRecipe(array $aRequest): array
    {
        $sSearchKeyword = $this->getSearchKeyword($aRequest);
        $oCategoryRepository = new CategoryRepository();
        $sCategoryId = (string)data_get($oCategoryRepository->getCategoryByName($sSearchKeyword), '0.id', '');
        $oRecipe = Recipe::select(AppConstants::RECIPE_LIST_FIELDS)
            ->where(AppConstants::STATUS, 1)
            ->whereRaw($this->getRawLikeLower(AppConstants::RECIPE_NAME), $sSearchKeyword)
            ->orWhereRaw($this->getRawLikeLower(AppConstants::INGREDIENTS_JSON), $sSearchKeyword);
        if (empty($sCategoryId) === false) {
            $oRecipe = $oRecipe->orWhereRaw($this->getRawLikeLower(AppConstants::CATEGORY_JSON), $this->wrapLike($sCategoryId));
        }

        return $this->parseData($oRecipe->skip($aRequest[AppConstants::OFFSET])
            ->take($aRequest[AppConstants::LIMIT])
            ->orderBy(AppConstants::ID, AppConstants::DESC)
            ->get()
        );
    }

    /**
     * Get recipe by slug name
     * @param string $sSlugName
     * @return array
     */
    public function getRecipeBySlugName(string $sSlugName): array
    {
        $aRecipe = $this->parseData(Recipe::with('gallery:image_url,recipe_id')
            ->select(AppConstants::RECIPE_BY_SLUG_FIELDS)
            ->where(AppConstants::STATUS, 1)
            ->where(AppConstants::SLUG_NAME, '=', $sSlugName)
            ->get()
        );
        $aGallery = data_get($aRecipe, '0.gallery.*.image_url', []);
        array_unshift($aGallery, data_get($aRecipe, '0.main_image', ''));
        data_set($aRecipe, '0.gallery', $aGallery);
        return $aRecipe;
    }
}
