const mix = require('laravel-mix');
require('laravel-mix-polyfill');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/maintenance.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/notFound.js', 'public/js')
    .js('resources/js/recipeList.js', 'public/js')
    .js('resources/js/recipe.js', 'public/js')
    .js('resources/js/gallery.js', 'public/js')
    .js('resources/js/timeline.js', 'public/js')
    .js('resources/js/contact.js', 'public/js')
    .postCss('resources/css/maintenance.css', 'public/css')
    .postCss('resources/css/Front.css', 'public/css')
    .polyfill({
        enabled: true,
        useBuiltIns: 'usage',
        targets: {'ie': 11},
        debug: true,
        corejs: 3,
    })
    .disableNotifications()
    .version();
