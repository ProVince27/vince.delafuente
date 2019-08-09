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

// mix.js('resources/js/app.js', 'public/js')
// .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/app.js','dist/js')
.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
})

/* set the build path */
mix.webpackConfig({
    output: {
        path: path.resolve(__dirname, 'public'),
        // chunkFilename: 'dist/[name].js',
    }  
})

mix.extract(['vue','jquery','admin-lte'])
