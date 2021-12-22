const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/*mix.js('resources/js/app.js', 'public/backend/js')
    .postCss('resources/css/app.css', 'public/backend/css', [
        //
    ]);*/

mix.styles([
    'public/backend/assets/plugins/fontawesome/css/all.min.css',
    'public/backend/assets/plugins/image_uploader/image-uploader.min.css',
    'public/backend/assets/plugins/simplebar/css/simplebar.css',
    'public/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css',
    'public/backend/assets/plugins/metismenu/css/metisMenu.min.css',
    'public/backend/assets/css/pace.min.css',
    'public/backend/assets/css/bootstrap.min.css',
    'public/backend/assets/css/app.css',
    'public/backend/assets/css/dark-theme.css',
    'public/backend/assets/css/semi-dark.css',
    'public/backend/assets/css/semi-dark.css',
    'public/backend/assets/css/header-colors.css',
    'public/backend/assets/css/icons.css',
    'public/backend/assets/plugins/toastr/toastr.min.css',
    'public/backend/assets/css/main.css',
], 'public/css/app.css').options({
    processCssUrls: false
});

mix.styles([
    'public/backend/assets/plugins/fontawesome/css/all.min.css',
    'public/backend/assets/css/bootstrap.min.css',
    'public/frontend/css/jpreloader.css',
    'public/frontend/css/animate.css',
    'public/frontend/css/plugin.css',
    'public/frontend/css/owl.carousel.css',
    'public/frontend/css/owl.theme.css',
    'public/frontend/css/owl.transitions.css',
    'public/frontend/css/style.css',
    'public/frontend/css/bg.css',
    'public/frontend/rs-plugin/css/settings.css',
    'public/frontend/css/rev-settings.css',
], 'public/css/fr_app.css').options({
    processCssUrls: false
});

mix.scripts([
    'public/backend/assets/js/jquery.min.js',
    'public/backend/assets/js/bootstrap.bundle.min.js',
    'public/backend/assets/plugins/fontawesome/js/all.min.js',
    'public/backend/assets/plugins/toastr/toastr.min.js',
    'public/backend/assets/plugins/simplebar/js/simplebar.min.js',
    'public/backend/assets/plugins/image_uploader/image-uploader.min.js',
    'public/backend/assets/plugins/metismenu/js/metisMenu.min.js',
    'public/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js',
    'public/backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js',
    'public/backend/assets/js/pace.min.js',
    'public/backend/assets/js/index3.js',
    'public/backend/assets/js/app.js',
    'public/backend/assets/js/main.js',
], 'public/js/app.js');

mix.scripts([
    // 'public/backend/assets/js/jquery.min.js',
    // 'public/backend/assets/js/bootstrap.bundle.min.js',
    // 'public/backend/assets/plugins/fontawesome/js/all.min.js',
    'public/frontend/js/jpreLoader.js',
    'public/frontend/js/jquery.isotope.min.js',
    'public/frontend/js/easing.js',
    'public/frontend/js/jquery.flexslider-min.js',
    'public/frontend/js/jquery.scrollto.js',
    'public/frontend/js/owl.carousel.js',
    'public/frontend/js/jquery.countTo.js',
    'public/frontend/js/classie.js',
    'public/frontend/js/video.resize.js',
    'public/frontend/js/validation.js',
    'public/frontend/js/wow.min.js',
    'public/frontend/js/jquery.magnific-popup.min.js',
    'public/frontend/js/jquery.stellar.min.js',
    'public/frontend/js/enquire.min.js',
    'public/frontend/js/cookit.js',
    'public/frontend/js/designesia.js',
    'public/frontend/rs-plugin/js/jquery.themepunch.plugins.min.js',
    'public/frontend/rs-plugin/js/jquery.themepunch.revolution.min.js',
], 'public/js/fr_app.js');
