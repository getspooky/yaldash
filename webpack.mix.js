 let mix = require('laravel-mix');

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

  mix.sass('src/resources/sass/boot.scss','src/published/css/').
      js('src/resources/js/app.js','src/published/js/');



