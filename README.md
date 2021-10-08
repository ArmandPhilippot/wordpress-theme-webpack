# WordPress Theme Webpack

![License](https://img.shields.io/github/license/boilerplates-collection/wordpress-theme-webpack?color=blue&colorA=4c4f56&label=License&style=flat-square) ![Version](https://img.shields.io/github/package-json/v/boilerplates-collection/wordpress-theme-webpack?color=blue&colorA=4c4f56&label=Version&style=flat-square)

A WordPress boilerplate to develop themes with webpack.

## Requirements

* You need [npm](https://www.npmjs.com/) and [Composer](https://getcomposer.org/) in order to install dependencies.

* This boilerplate uses Standard version to generate a changelog and Husky to validate commits, so you need to follow the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/).

* In order to avoid the warnings related to the local use of `https`, you will need a valid certificate. You can achieve this with [mkcert](https://github.com/FiloSottile/mkcert).

## Features

### What is included?

* [BabelJS](https://babeljs.io/)
* [Commitlint](https://commitlint.js.org/)
* [Dotenv](https://github.com/motdotla/dotenv) and [PHPDotenv](https://github.com/vlucas/phpdotenv)
* [ESlint](https://github.com/eslint/eslint)
* [Husky](https://github.com/typicode/husky)
* [Lint-staged](https://github.com/okonet/lint-staged)
* [Modern-normalize](https://github.com/sindresorhus/modern-normalize)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [Playwright](https://github.com/microsoft/playwright)
* [PostCSS](https://postcss.org/)
* [RTLCSS](https://rtlcss.com/)
* [Standard version](https://github.com/conventional-changelog/standard-version)
* [Stylelint](https://github.com/stylelint/stylelint)
* [webpack](https://webpack.js.org/)
* [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards)
* [WordPress-Prettier](https://github.com/Automattic/wp-prettier)
* [wp-pot](https://github.com/wp-pot/wp-pot)

### webpack

webpack will:

* compile Sass to CSS and process styles with postcss and autoprefixer,
* generate `style.css` in the theme root,
* generate `editor.css` and `print.css` in `assets/css`,
* transpile JS files with Babel and output them in `assets/js`,
* compress images in `src/images` and copy them in `assets/images`,
* handle fonts by copying `src/fonts` to `assets/fonts`.

webpack comes with two mode: `development` and `production`. Here the difference for JS and CSS files :

|Features|`development`|`production`|
|---|:-:|:-:|
|Hot Module Replacement|✓|𐄂|
|Live Reload|✓|𐄂|
|Minify|𐄂|✓|
|Sourcemaps|✓|𐄂|
|Written to disk|𐄂|✓|

### npm scripts

With `npm`, you can use some scripts:

* `npm run build`: write assets in `assets` folder and generate RTL version for each CSS file.
* `npm run watch`: build assets in dev mode and continue to watch for changes.
* `npm run serve`: launch webpack dev server, open your website in the desired browser and refresh it on changes.
* `npm run lint`: check if all files respects your coding standards.
* `npm run fix`: fix all files to comply with your coding standards.
* `npm run rtl`: generate a RTL version of each CSS file.
* `npm run translate`: generate a `.pot` file in `./languages`.
* `npm run screenshot`: take a screenshot (`1200x900`) of your homepage and save `screenshot.png` in your theme root.
* `npm run release`:
    * bump `package.json`, `readme.txt`, `functions.php` and `src/scss/abstracts/_variables.scss`,
    * launch build to update version in `style.css`,
    * create a new commit with a new tag for your release.
* `npm run zip`: create a compressed file of your theme, excluding files needed only in development mode.

To lint/fix a specific type of files, you can also use a "sub" script:
* `npm lint:js` / `npm fix:js` for JS files,
* `npm lint:php` / `npm fix:php` for PHP files,
* `npm lint:scss` / `npm fix:scss` for SCSS files.

## How to use it

### First steps

Clone this repo, copy `wordpress-theme` in your WordPress installation ( `wp-content/themes/` ) and rename it. Then, in your theme directory:

1. Init Git (otherwise Husky will not install hooks)
2. Launch `npm install` and `composer update`
3. Execute `npx husky install` to install Git hooks
4. Copy `.env.example` and rename it `.env`
5. Edit your `.env` file to suit your project.
6. Launch `npm run init`
7. You may want to relaunch `npm install` so that your `package-lock.json` contains the correct information.
8. Execute `npm run build`: it creates the `style.css` file needed by WordPress to activate the theme.

That's it! You can now start developing your theme.

### Complete the configuration

If you need to complete the boilerplate:

* `tools/` contains files required by webpack and npm scripts,
    * `tools/bump/` contains files used to bump version,
    * `tools/utils/` contains files that can be reused between scripts,
    * `tools/webpack/` contains webpack config in addition to `webpack.config.js` in the theme root,
    * `tools/init.js` is used to init your theme,
    * `tools/screenshot.js` is used to take a screenshot of your website,
    * `tools/translate.js` handle the `.pot` generation for translation,
    * `tools/zip.js` handle the `.zip` generation.

## Tips

### Formatting JS files in VS Code with Prettier and ESlint

If you are using Prettier extension to auto-fix your files, you may want to disable it for Javascript. Prettier doesn't work well with ESlint rules (in particular space rules). So, I recommend you to set these settings in your workspace:

```json
{
    "editor.codeActionsOnSave": {
        "source.fixAll": true,
    },
    "editor.formatOnSave": true,
    "[javascript]": {
        "editor.formatOnSave": false,
    }
}
```
This way, only the ESlint extension will be used to format your JS files.

## Additional Notes

If you plan to publish your theme on [WordPress Theme directory](https://wordpress.org/themes/), you may want to edit `readme.txt` manually to provides all necessary information. I'm not sure this is required for themes (it is for plugins), but it is at least recommended. See [a revised readme](https://make.wordpress.org/themes/2015/04/29/a-revised-readme/) for an example.

You need at least `410MiO` of free space*: `node_modules` is about `200 Mio` but a dependency (`playwright-firefox`) also creates a folder of about `206 Mio` in your cache directory. I have chosen the Firefox version because the webkit version did not work on my system and the Chromium version took a little more space.

*The sizes are given for information only, they may vary.

## License

This project is open-sourced and available under the [GPL-v2-or-later](./LICENSE) license.
