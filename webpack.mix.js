const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/AddLike.js', 'public/js');

mix.js('resources/js/DeleteFav.js', 'public/js');

mix.js('resources/js/PopUpBlock.js', 'public/js');

mix.js('resources/js/SendCallRequest.js', 'public/js');

mix.js('resources/js/deleteButtonAsync.js', 'public/js');

mix.js('resources/js/GuestLike.js', 'public/js');