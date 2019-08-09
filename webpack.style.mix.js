const mix = require('laravel-mix');

mix.sass('resources/app.scss','public/dist/css')
.sass('resources/vendor.scss','public/dist/css')