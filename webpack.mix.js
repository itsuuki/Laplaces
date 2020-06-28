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
    .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/shop.js', 'public/js');
mix.js('resources/js/delete-com.js', 'public/js');
mix.js('resources/js/price.js', 'public/js');
mix.js('resources/js/favorite.js', 'public/js')
    .sass('resources/sass/shop.scss', 'public/css');
mix.sass('resources/sass/post.scss', 'public/css');
mix.js('resources/js/user.js', 'public/js')
    .sass('resources/sass/user.scss', 'public/css');
mix.js('resources/js/post.js', 'public/js')
    .sass('resources/sass/post_all.scss', 'public/css');
mix.js('resources/js/reviews.js', 'public/js')
    .sass('resources/sass/reviews.scss', 'public/css');
    mix.sass('resources/sass/datail.scss', 'public/css');