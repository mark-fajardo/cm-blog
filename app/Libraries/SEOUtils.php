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
            'description' => 'You can see all about Chef Morris Danzen\'s recipes, top recipes and recipes of the month. You can contact also Chef Morris Danzen here on his website.',
            'endpoint'    => '/',
            'type'        => 'blog',
            'keywords'    => 'chef morris danzen website, chef morris website, chef danzen website, chef morris danzen official website, chef morris official, chef morris main website, chef morris top recipes, chef morris, chef danzen, chef morris blog',
        ]);
    }

    /**
     * Setup About Me SEO METAs.
     */
    private static function aboutMeSetup(): void
    {
        self::setupCommon([
            'title'       => 'About Me - Chef Morris Danzen',
            'description' => 'You can see all about Chef Morris Danzen. His Mission, Vision, and his journey to become an internationally well-known and a successful chef.',
            'endpoint'    => '/about-me',
            'type'        => 'blog',
            'keywords'    => 'about chef morris danzen, about chef morris, about chef danzen website, about chef morris danzen journey, about chef morris official, chef morris about me page, chef morris story, chef morris, chef danzen',
        ]);
    }

    /**
     * Setup recipe list SEO METAs.
     */
    private static function recipesSetup(): void
    {
        self::setupCommon([
            'title'       => 'Recipes - Chef Morris Danzen',
            'description' => 'All About Chef Morris Danzen. You can see the list of all the Recipes of Chef Morris Danzen.',
            'endpoint'    => '/recipes',
            'type'        => 'recipes',
            'keywords'    => 'chef morris danzen recipes, chef morris recipes, chef morris top recipes, top recipes, chef morris own recipes, chef morris recipe of the month, search chef morris recipes'
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
            'keywords'    => data_get(self::$aData, AppConstants::RECIPE_NAME, 'recipe') . ', chef morris recipe, view chef morris recipe, recipe procedures, chef morris procedures, recipe ingredients, chef morris ingredients list'
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
            'keywords'    => 'chef morris food gallery, food gallery, chef morris gallery, gallery, food images, recipe images, chef morris images, gallery images, chef morris own gallery, chef morris own food images'
        ]);
    }

    /**
     * Setup timeline SEO METAs.
     */
    private static function timelineSetup(): void
    {
        self::setupCommon([
            'title'       => 'Timeline - Chef Morris Danzen',
            'description' => 'Contains the recipe timeline of Chef Morris Danzen. Timeline of all the recipes of Chef Morris Danzen.',
            'endpoint'    => '/timeline',
            'type'        => 'timeline',
            'keywords'    => 'chef morris timeline, chef morris recipe timeline, chef morris recipes, chef morris recipe feeds, chef morris feeds, chef morris timeline recipes'
        ]);
    }

    /**
     * Setup contact SEO METAs.
     */
    private static function contactSetup(): void
    {
        self::setupCommon([
            'title'       => 'Contact Me - Chef Morris Danzen',
            'description' => 'Contact page where you can contact Chef Morris Danzen via Chef Morris Blog.',
            'endpoint'    => '/contact',
            'type'        => 'contact',
            'keywords'    => 'chef morris contact, contact chef morris, send message, chef morris message, chef morris newsletter, ask chef morris, where is chef morris, locate chef morris'
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
        SEOMeta::addKeyword(strtolower(data_get($aData, 'keywords', 'chef morris danzen website')));

        // TODO: UPDATE LOGO
        SEOTools::jsonLd()->addImage('https://files.chefmorrisdanzen.com/l/img/logo/favicon.png');
    }
}
