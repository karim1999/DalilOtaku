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
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/fonts', 'public/fonts')
mix.js('resources/js/nav.js', 'public/js')
mix.js('resources/js/faq.js', 'public/js')
mix.js('resources/js/dropdown.js', 'public/js')
mix.js('resources/js/anime.js', 'public/js')
mix.js('resources/js/animeList.js', 'public/js')




//Admin
mix.sass('resources/sass/admin.scss', 'public/css')
