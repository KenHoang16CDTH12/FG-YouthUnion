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
//webpack.mix.js
mix.webpackConfig({
    output: {
        publicPath: '/',
        chunkFilename: 'js/[name].[chunkhash].js',
    },
});
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copyDirectory('resources/assets/app-assets', 'public/app-assets')
   .copyDirectory('resources/assets/core-assets', 'public/core-assets');
