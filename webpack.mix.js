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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/maintenance.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/maintenance.css', 'public/css')
    .polyfill({
        enabled: true,
        useBuiltIns: 'usage',
        targets: {'ie': 11},
        debug: true,
        corejs: 3,
    }).version();
