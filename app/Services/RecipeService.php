<?php

namespace App\Services;

use App\Libraries\DBUtils;
use App\Repository\RecipeRepository;
use Illuminate\Http\Request;

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
        return $this->validateResponse($aPromotedRecipe, $this);
    }

    /**
     * Get all recommended recipes.
     * @return RecipeService
     */
    public function recommendedRecipes(): RecipeService
    {
        $aRecommendedRecipes = $this->oRecipeRepository->getRecommendedRecipes();
        return $this->validateResponse($aRecommendedRecipes, $this);
    }

    /**
     * Get all recommended video recipes.
     * @return RecipeService
     */
    public function recommendedVideoRecipes(): RecipeService
    {
        $aRecommendedVideoRecipes = $this->oRecipeRepository->getRecommendedVideoRecipes();
        return $this->validateResponse($aRecommendedVideoRecipes, $this);
    }

    /**
     * Get all recipe count.
     * @param Request $oRequest
     * @return RecipeService
     */
    public function getRecipeCount(Request $oRequest): RecipeService
    {
        $this->request($oRequest);
        $this->aResponse = DBUtils::formatResponse(true,
            $this->oRecipeRepository->getRecipeCount($this->aRequest)
        );
        return $this;
    }

    /**
     * Get all recipe.
     * @param Request $oRequest
     * @return RecipeService
     */
    public function getRecipe(Request $oRequest): RecipeService
    {
        $this->request($oRequest);
        $aRecipes = $this->oRecipeRepository->getRecipe($this->aRequest);
        return $this->validateResponse($aRecipes, $this);
    }

    /**
     * Get recipe by slug name.
     * @param string $sSlugName
     * @return RecipeService
     */
    public function getRecipeBySlugName(string $sSlugName = ''): RecipeService
    {
        $aRecipes = $this->oRecipeRepository->getRecipeBySlugName($sSlugName);
        $aRecipe = data_get($aRecipes, '0', []);
        if (empty($aRecipe) === true) {
            abort(404);
        }

        return $this->validateResponse($aRecipe, $this);
    }
}
