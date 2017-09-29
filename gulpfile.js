const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
    /**
     *  Building SASS files
     */
    mix.sass('app.scss');

    mix.styles([
        './node_modules/font-awesome/css/font-awesome.css'
    ], 'public/css/vendor.css');

    mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

    /**
     *  Building Javascript files
     */
    mix.webpack('app.js');
});
