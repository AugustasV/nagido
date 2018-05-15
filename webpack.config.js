var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(true)
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(true)

    // uncomment to define the assets of the project
    // .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/landing', './assets/js/landing.js')
    .addStyleEntry('css/inside', './assets/css/inside.scss')
    .addStyleEntry('css/landing', './assets/css/landing.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
