const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
    /**
     *  Building SASS files
     */
    mix.sass('app.scss');

    /**
     *  Concatenating font-awesome styles files in vendor.css
     */
    mix.styles([
        './node_modules/font-awesome/css/font-awesome.css'
    ], 'public/css/vendor.css');

    /**
     *  Coping fonts of font-awesome for public/build/fonts path
     */
    mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts');

    /**
     *  Coping images of menu cards for public/imgs path
     */
    mix.copy('resources/assets/imgs', 'public/imgs');

    /**
     *  Building Javascript files
     */
    mix.webpack('app.js');

    /**
     *  Versioning files
     */
    mix.version([
       'public/css/vendor.css',
       'public/css/app.css',
       'public/js/app.js',
    ]);

    /**
     *  Syncing files in Browser
     */
    mix.browserSync({
        files: [
            elixir.config.appPath + '/**/*.php',
            elixir.config.get('public.css.outputFolder') + '/**/*.css',
            elixir.config.get('public.versioning.buildFolder') + '/rev-manifest.json',
            'resources/assets/views/**/*.php',
            'resources/assets/js/**/*.vue'
        ],
        proxy: 'app:8080',
        open: false,
    });
});
