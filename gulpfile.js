const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var user = {
    'login' : './resources/assets/js/users/recover-password.js',
    'edit' : {
        'sidebar' : './resources/assets/js/users/edit/sidebar.js'
    }
};

var paths = {
    'jquery': './node_modules/jquery/dist/jquery.js',
    'bootstrap': './node_modules/bootstrap/dist/js/bootstrap.js',
    'tether': './node_modules/tether/dist/js/tether.js',
    'chosen': './node_modules/chosen-js/chosen.jquery.js',
    'global': './resources/assets/js/global.js',
    'user' : user
};

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

elixir(mix => {
    mix.sass('styles.scss')
        .sass('ie.scss')

// .webpack('app.js')
       .scripts([
           paths.jquery,
           paths.chosen,
           paths.tether,
           paths.bootstrap,
           paths.global,
           paths.user.login,
           paths.user.edit.sidebar,
        ],
        'public/js/all.js',
        './'
        )
        .copy('node_modules/font-awesome/fonts', 'public/fonts')
});
