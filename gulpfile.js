var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

    mix.webpack([
        'autoCompleteUsers.js',
        'validation.js',
        'jQueryEvents.js',
        'modules/pagination.js',
        'modules/messagesCompleteProfile.js',
        'modules/conversations.js',
        'modules/suggestedSites.js',
        'modules/transition.js',
        'modules/bannerHome.js',
        'modules/previewPhoto.js',
        'app.js'],
    "public/js/app.js");

    mix.styles([
            'home.css',
            'conversation.css',
            'jquery.datetimepicker.css'
        ],
    'public/css/site.css');


});
