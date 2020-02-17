const mix = require('laravel-mix');
require('laravel-mix-versionhash')
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
mix.js('resources/app.js','dist/js/')
mix.setResourceRoot('dist/js/')

/* set the build path */
mix.webpackConfig({
    output: {
        path: path.resolve(__dirname, 'public/'),
        chunkFilename: 'dist/js/[name].js',
    }
})

mix.extract([
    'jquery',
    'admin-lte',
    'vue',
    'lodash',
    'vuex',
    'vue-context',
    // 'laravel-file-manager',
    'vuedraggable',
    'moment',
    /* '@ckeditor/ckeditor5-build-classic', */
    '@ckeditor/ckeditor5-vue',
    '@ckeditor/ckeditor5-build-inline',
    '@ckeditor/ckeditor5-build-balloon',
    '@ckeditor/ckeditor5-ckfinder/src/ckfinder'
])
// .versionHash()
 mix.disableNotifications()
