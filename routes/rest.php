<?php
/*
|--------------------------------------------------------------------------
| Rest Routes
|--------------------------------------------------------------------------
|
| Here is where you can register rest routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Rest endpoints **/
Route::group(['middleware' => ['app.state'], 'prefix' => 'rest'], static function() {
    // Page config rests
    Route::get('page-config', 'PageConfigController@getPageConfig');

    // Recipe rests
    Route::group(['prefix' => 'recipe'], static function() {
        Route::get('promoted', 'RecipeController@getPromotedRecipe');
        Route::get('recommended', 'RecipeController@getRecommendedRecipes');
        Route::get('recommended/videos', 'RecipeController@getRecommendedVideoRecipes');
        Route::get('count', 'RecipeController@getRecipeCount');
        Route::get('', 'RecipeController@getRecipe');
        Route::get('/{sSlugName}', 'RecipeController@getRecipeBySlugName');
    });

    // Category rests
    Route::group(['prefix' => 'category'], static function() {
        Route::get('', 'CategoryController@getAllCategories');
    });

    // Gallery rests
    Route::group(['prefix' => 'gallery'], static function() {
        Route::get('', 'GalleryController@getGalleryImages');
    });

    // Timeline rests
    Route::group(['prefix' => 'timeline'], static function() {
        Route::get('', 'TimelineController@getTimeline');
    });
});
