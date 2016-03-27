var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        '../../../bower_components/bootstrap/dist/css/bootstrap.min.css',
        'custom.css'
    ]);
});

elixir(function(mix) {
    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.min.js',
        '../../../bower_components/jquery-validation/dist/jquery.validate.min.js',
        '../../../bower_components/angular/angular.min.js',
        '../../../bower_components/angular-ui-router/release/angular-ui-router.min.js',
        '../../../bower_components/jpkleemans-angular-validate/dist/angular-validate.min.js',
        'app.js',
        'controller.js'
    ]);
});
