<?php

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use App\Libraries\SEOUtils;
use App\Repository\RecipeRepository;
use App\Services\RecipeService;
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
    SEOUtils::setSEOTools('home');
    return view('pages.home')->with(DBUtils::getStateToken());
});
Route::get('/about-me', function () {
    SEOUtils::setSEOTools('aboutMe');
    return view('pages.about_me')->with(DBUtils::getStateToken());
});
Route::get('/recipe-list', function () {
    SEOUtils::setSEOTools('recipes');
    return view('pages.recipe_list')->with(DBUtils::getStateToken());
});
Route::get('/recipe/{sSlugName}', function (string $sSlugName) {
    SEOUtils::setSEOTools('recipe', (new RecipeService(new RecipeRepository()))->getRecipeBySlugName($sSlugName)->get()[AppConstants::DATA]);
    return view('pages.recipe')->with(DBUtils::getStateToken());
});
Route::get('/gallery', function () {
    SEOUtils::setSEOTools('gallery');
    return view('pages.gallery')->with(DBUtils::getStateToken());
});
Route::get('/timeline', function () {
    SEOUtils::setSEOTools('timeline');
    return view('pages.timeline')->with(DBUtils::getStateToken());
});
Route::get('/contact', function () {
    SEOUtils::setSEOTools('contact');
    return view('pages.contact')->with(DBUtils::getStateToken());
});
