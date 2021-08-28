<?php

use App\Libraries\DBUtils;
use App\Models\PageConfig;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home')->with(DBUtils::getStateToken());
});

/** Rest endpoints **/
Route::group(['middleware' => ['app.state'], 'prefix' => 'rest'], static function() {
    // Page config rests
    Route::get('page-config', 'PageConfigController@getPageConfig');

    // Recipe rests
    Route::group(['prefix' => 'recipe'], static function() {
        Route::get('promoted', 'RecipeController@getPromotedRecipe');
        Route::get('recommended', 'RecipeController@getRecommendedRecipes');
        Route::get('recommended/videos', 'RecipeController@getRecommendedVideoRecipes');
    });
});
