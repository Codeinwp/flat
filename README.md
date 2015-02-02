# Flat

[![Travis CI Build Status](https://travis-ci.org/yoarts/flat.svg?branch=master)](https://travis-ci.org/yoarts/flat)
* Author: YoArts
* Author URL: http://www.yoarts.com
* Contributer: @yoarts, @ghost, @ashfame, @kevinpapst, @abovethewater
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html

## Description

Flat is a WordPress Blog Theme designed by YoArts. We would like to say that Flat is both beautiful and charming at the same time.

## Features list

* [Grunt](http://gruntjs.com/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files
* [Bower](http://bower.io/) for front-end package management
* Responsive Layout
* Off-Canvas Sidebar on Handheld Devices
* Custom Background
* Custom Sidebar Color
* Editor Style
* Write on HTML5 / LESS
* [Bootstrap](http://getbootstrap.com/) 3.3.2
* [Font Awesome](http://fontawesome.io/) 4.3.0
* Compatible up to WordPress 4.1
* Customize: Logo, Favicon, Sidebar Background Color, Archive Posts, Single Post
* Google Fonts select for Customize: Body, Site Title, Heading, Sub-Heading
* Translation Ready (Language available: English, German, French, Russian, Spanish, Brazil, Nederlands)

## Resources

Flat is built with the following resources:

**Code based on DW Minion**

 - http://www.designwall.com/wordpress/themes/dw-minion/
 - Copyright: DesignWall, http://www.designwall.com/
 - License under GPL v3.0: http://www.gnu.org/licenses/gpl-3.0.html

**Bootstrap 3.2.0**

 - http://getbootstrap.com/
 - Copyright: @mdo: twitter.com/mdo and @fat: twitter.com/fat

**Font Awesome 4.1.0**

 - http://fontawesome.io/
 - Copyright: Dave Gandy, twitter.com/davegandy
 - Font Awesome licensed under SIL OFL 1.1: http://scripts.sil.org/OFL
 - Code licensed under MIT License: http://opensource.org/licenses/mit-license.html

**HTML5 Shiv 3.7.2**

 - @afarkas @jdalton @jon_neal @rem
 - MIT/GPL2 Licensed

## Contributers

 - TobsCore: https://github.com/TobsCore
 - Marcus Michaels: https://github.com/marcusmichaels
 - Creative-mind: https://github.com/creative-mind
 - Mrinal Kanti Roy: https://github.com/mkrdip
 - Victor Perin: https://github.com/victorperin
 - Victor Tsaran: https://github.com/vick08
 - Darshan Sawardekar: https://github.com/dsawardekar
 - Teddy Rilliot: https://github.com/TeddyRilliot
 - Richard Alexander von Moltke Necochea: http://twitter.com/ravmn
 - Фарух Джапаркулов
 - Didier: http://www.wptrads.com/theme/flat-2/
 - abovethewater: https://github.com/abovethewater
 - Kevin Papst: http://www.kevinpapst.de/wordpress-flat-theme/
 - Ashfame: https://github.com/ashfame

## Theme development

Flat uses [Grunt](http://gruntjs.com/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files.

Add the following to your `wp-config.php` on your development installation:

```php
define('WP_ENV', 'development');
```
### Install Grunt

**Unfamiliar with npm? Don't have node installed?** [Download and install node.js](http://nodejs.org/download/) before proceeding.

From the command line:

1. Install `grunt-cli` globally with `npm install -g grunt-cli`.
2. Navigate to the theme directory, then run `npm install`. npm will look at `package.json` and automatically install the necessary dependencies. It will also automatically run `bower install`, which installs front-end packages defined in `bower.json`.

When completed, you'll be able to run the various Grunt commands provided from the command line.

### Available Grunt commands

* `grunt dev` — Compile LESS to CSS, concatenate and validate JS
* `grunt watch` — Compile assets when file changes are made
* `grunt build` — Create minified assets, then export theme package for WordPress.org
