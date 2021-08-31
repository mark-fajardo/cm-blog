<?php

namespace App\Libraries;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use phpDocumentor\Reflection\Types\This;

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
            'endpoint'    => '/',
            'type'        => 'recipes',
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
        SEOMeta::addKeyword(data_get($aData, 'keywords', '') . 'recipe list, recipe, cooking vlogs, chef morris danzen, chef, chef morris, morris, danzen, chef danzen, morris danzen, food gallery, gallery, cooking tutorials, tutorial, cooking, pinoy chef, pinoy food, pinoy dishes, pinoy vlog, Video, youtube, facebook, twitter');

        // TODO: UPDATE LOGO
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');
    }
}
