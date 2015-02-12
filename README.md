# WordPress demo theme for the Karlsruhe meetup

### Structure
The theme makes use of only a single template - [**page-home.php**](./page-home.php). It has no name so in order for WordPress to find it, call the home page _"Home"_ with a slug _"home"_.

### Dependencies for development
The theme uses bower and npm for dependency management. To install the needed modules run:

1. `npm install`
2. `bower install`
3. `npm install -g grunt-cli` (if you don't have grunt installed)

### Development and asset compilation
Once the dependencies are installed, If your text editor is Sublime Text, you can run use the takana grunt task to auto update the browser while editing the .scss files. Run `grunt live` in the terminal to start takana.

With `grunt watch` you can observe the theme folder for file changes and reload the browser automatically with LiveReload.

Check out the [Gruntfile](Gruntfile.js) for the registered tasks.