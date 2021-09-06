<?php

namespace App\Libraries;

use App\Constants\AppConstants;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

/**
 * Class SEOUtils
 * @package App\Libraries
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.31
 */
class SEOUtils
{
    /**
     * @var array
     */
    private static $aData = [];

    /**
     * Set seo tools by route.
     * @param string $sRoute
     * @param array $aData
     */
    public static function setSEOTools(string $sRoute, array $aData = []): void
    {
        self::$aData = $aData;
        SEOUtils::{ strtolower($sRoute) . 'Setup' }();
    }

    /**
     * Setup home SEO METAs.
     */
    private static function homeSetup(): void
    {
        self::setupCommon([
            'title'       => 'Home - Chef Morris Danzen',
            'description' => 'All About Chef Morris Danzen. Recipe of the Month. About Chef Morris Danzen. Youtube Vlogs. Chef Morris Danzen Contact.',
            'endpoint'    => '/',
            'type'        => 'blog'
        ]);
    }

    /**
     * Setup recipe list SEO METAs.
     */
    private static function recipesSetup(): void
    {
        self::setupCommon([
            'title'       => 'Recipe List - Chef Morris Danzen',
            'description' => 'All About Chef Morris Danzen. List of all the Recipes of Chef Morris Danzen.',
            'endpoint'    => '/recipe-list',
            'type'        => 'recipes',
        ]);
    }

    /**
     * Setup recipe SEO METAs.
     */
    private static function recipeSetup(): void
    {
        self::setupCommon([
            'title'       => data_get(self::$aData, AppConstants::RECIPE_NAME, 'Recipe') . ' - Chef Morris Danzen',
            'description' => data_get(self::$aData, AppConstants::SHORT_DESCRIPTION, ''),
            'endpoint'    => '/recipe/' . data_get(self::$aData, AppConstants::SLUG_NAME, ''),
            'type'        => 'recipe',
        ]);
        OpenGraph::addImage(data_get(self::$aData, AppConstants::MAIN_IMAGE, ''));
    }

    /**
     * Setup gallery SEO METAs.
     */
    private static function gallerySetup(): void
    {
        self::setupCommon([
            'title'       => 'Gallery - Chef Morris Danzen',
            'description' => 'Contains the recipe gallery of Chef Morris Danzen. Gallery from the recipes of Chef Morris Danzen.',
            'endpoint'    => '/gallery',
            'type'        => 'gallery',
        ]);
    }

    /**
     * Setup common METAs.
     * @param array $aData
     */
    private static function setupCommon(array $aData): void
    {
        SEOTools::setTitle(data_get($aData, 'title', ''), false);
        SEOTools::setDescription(data_get($aData, 'description', ''));
        SEOTools::opengraph()->setUrl(config('app.url') . data_get($aData, 'endpoint', ''));
        SEOTools::setCanonical(config('app.url'));
        SEOTools::opengraph()->addProperty('type', data_get($aData, 'type', 'blog'));
        SEOTools::twitter()->setSite(data_get($aData, 'twitter_username', '@MorrisDanzen'));
        SEOMeta::addKeyword(data_get($aData, 'keywords', 'recipe list') . ', recipe, cooking vlogs, chef morris danzen, chef, chef morris, morris, danzen, chef danzen, morris danzen, food gallery, gallery, cooking tutorials, tutorial, cooking, pinoy chef, pinoy food, pinoy dishes, pinoy vlog, Video, youtube, facebook, twitter');

        // TODO: UPDATE LOGO
        SEOTools::jsonLd()->addImage('https://files.chefmorrisdanzen.com/img/logo/favicon.png');
    }
}
