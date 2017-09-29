const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
    /**
     *  Building SASS files
     */
    mix.sass('app.scss');

    /**
     *  Building Javascript files
     */
    // mix.webpack('app.js');
});
