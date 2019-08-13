/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create web/build/style.css
    //mais on commenté cette ligne car on a chargé le fichier dans le layout.js
    //et pas la peine alors de l'ajouter ici
    //.addStyleEntry('style.min', './web/css/style.css')
    .addEntry('layout', './web/js/layout.js')

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    // enable source maps during development
    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning()

    // allow sass/scss files to be processed
    .enableSassLoader()
    
    //un fichier runtime va s'ajouter dans le build (il faut l'inclure avant tous les scripts)
    .enableSingleRuntimeChunk()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();

