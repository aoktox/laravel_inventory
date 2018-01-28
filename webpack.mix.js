// let mix = require('laravel-mix');

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

const {mix} = require('laravel-mix');
const CleanWebpackPlugin = require('clean-webpack-plugin');

// paths to clean
let pathsToClean = [
    'public/assets/js',
    'public/assets/css'
];

// the clean options to use
let cleanOptions = {};

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin(pathsToClean, cleanOptions)
    ]
});

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/pace-progress/pace.js',

], 'public/assets/js/main.js').version();

mix.styles([
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/pace-progress/themes/blue/pace-theme-minimal.css',
], 'public/assets/css/main.css').version();

mix.copy([
    'node_modules/font-awesome/fonts/',
], 'public/assets/fonts');

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',
], 'public/assets/css/app.css').version();

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/gentelella/build/js/custom.js',
], 'public/assets/js/app.js').version();

mix.copy([
    'node_modules/gentelella/vendors/bootstrap/dist/fonts',
], 'public/assets/fonts');


mix.scripts([
    'node_modules/select2/dist/js/select2.full.js'
], 'public/assets/js/select2.js').version();

mix.styles([
    'node_modules/select2/dist/css/select2.css'
], 'public/assets/css/select2.css').version();

mix.styles([
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/datatables.net-responsive-bs/css/responsive.bootstrap.css'
], 'public/assets/css/datatables.css').version();

mix.scripts([
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
    'node_modules/datatables.net-responsive-bs/js/responsive.bootstrap.js'
], 'public/assets/js/datatables.js').version();