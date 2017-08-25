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
        'jQueryEvents.js',
        'modules/pagination.js',
        'modules/messagesCompleteProfile.js',
        'modules/conversations.js',
        'validation.js',
        'modules/suggestedSites.js',
        'modules/transition.js',
        'modules/bannerHome.js',
        'modules/previewPhoto.js',
        'app.js'],
    "public/js/app.js");

    mix.styles([
            'bootstrap-material-design.min.css',            
            'bootstrap.min.css',
            'jquery.datetimepicker.css',
            'ripples.min.css',
            'font-awesome.css',
            'styleForms.css',
            'style.css',
            'style-mobile.css',
            'footer.css',
            'nav.css',
            'modal.css',
            'jquery-ui.css',
            'home.css',
            'conversation.css',
            'campaigns.css',
            'fonts.css',            
        ],
    'public/css/site.css');


});
