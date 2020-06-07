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
   .sass('resources/sass/custom.scss', 'public/css')

   mix.webpackConfig({
      devServer: {
          disableHostCheck: true,
          host: '0.0.0.0',
          port: 8080,
      },
      watchOptions: {
          poll: 2000,
          ignored: /node_modules/
      }
  });