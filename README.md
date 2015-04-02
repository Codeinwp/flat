# Flat

[![Travis CI Build Status](https://travis-ci.org/codeinwp/flat.svg?branch=master)](https://travis-ci.org/Codeinwp/flat) [![devDependency Status](https://david-dm.org/codeinwp/flat/dev-status.svg)](https://david-dm.org/codeinwp/flat#info=devDependencies) [![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/codeinwp/flat?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=body_badge)
* Author: YoArts
* Author URL: http://www.yoarts.com
* Contributor: @yoarts, @ghost, @ashfame, @kevinpapst, @abovethewater
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html

## Description

Flat is a responsive WordPress theme designed by YoArts. We would like to say that Flat is both beautiful and charming at the same time.

## Features

* Responsive layout
* Off-canvas sidebar on handheld devices and small screens
* WordPress customizer options:
  * Add site logo
  * Add favicon
  * Select fonts (via Google Fonts)
  * Choose colors
  * And more!
* Editor style for a more WYSIWYG post-editing experience
* Fully HTML5 compatible
* [Bootstrap](http://getbootstrap.com/) 3.3.2
  * Fully responsive framework
  * Wide variety of CSS effects available
* [Font Awesome](http://fontawesome.io/) 4.3.0
  * Over 500 icons scalable to any size
  * Several icon effects
  * Screen reader friendly
* Compatible up to WordPress 4.1
* Customization read via child themes and/or hooks (see below for available hooks)
* Microdata & Microformats - Enhancements for Richer Posts
* Translation ready, with the following languages included:
  * Brazilian Portugese
  * Dutch
  * English
  * French
  * German
  * Russian
  * Spanish
* [Grunt](http://gruntjs.com/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files
* [Bower](http://bower.io/) for front-end package management

## Resources

Flat is built with the following resources:

* **Code based on [DW Minion](http://www.designwall.com/wordpress/themes/dw-minion/)**
  * Copyright: [DesignWall](http://www.designwall.com/)
  * Licensed under [GPL v3.0](http://www.gnu.org/licenses/gpl-3.0.html)
* **[Bootstrap 3.3.2](http://getbootstrap.com/)**
  * Copyright: [@mdo](http://twitter.com/mdo) and [@fat](http://twitter.com/fat)
* **[Font Awesome 4.3.0](http://fontawesome.io/)**
  * Copyright: [Dave Gandy](http://twitter.com/davegandy)
  * Font Awesome licensed under [SIL OFL 1.1](http://scripts.sil.org/OFL)
  * Code licensed under [MIT License](http://opensource.org/licenses/mit-license.html)
* **[HTML5 Shiv 3.7.2](https://github.com/aFarkas/html5shiv)**
  * @afarkas @jdalton @jon_neal @rem
  * Licensed under [MIT/GPL2](https://github.com/aFarkas/html5shiv/blob/master/MIT%20and%20GPL2%20licenses.md)

## Contributers

* [TobsCore](https://github.com/TobsCore)
* [Marcus Michaels](https://github.com/marcusmichaels)
* [Creative-mind](https://github.com/creative-mind)
* [Mrinal Kanti Roy](https://github.com/mkrdip)
* [Victor Perin](https://github.com/victorperin)
* [Victor Tsaran](https://github.com/vick08)
* [Darshan Sawardekar](https://github.com/dsawardekar)
* [Teddy Rilliot](https://github.com/TeddyRilliot)
* [Richard Alexander von Moltke Necochea](http://twitter.com/ravmn)
* Фарух Джапаркулов
* [Didier](http://www.wptrads.com/theme/flat-2/)
* [abovethewater](https://github.com/abovethewater)
* [Kevin Papst](http://www.kevinpapst.de/wordpress-flat-theme/)
* [Ashfame](https://github.com/ashfame)
* [Rick Beckman](http://www.rickbeckman.com/)

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

## Customization

Flat is able to be customized extensively by the [WordPress hooks & filters API](http://codex.wordpress.org/Plugin_API), which is a fancy way of saying that without creating a child theme, you have the freedom to add, remove, and change a lot of what makes Flat _Flat_. In addition to the default hooks & filters that just about any WordPress theme has available, Flat is equipped with the following:

### Available hooks

* `flat_html_before`
* `flat_head_top`
* `flat_head_bottom`
* `flat_body_top`
* `flat_body_bottom`
* `flat_header_before`
* `flat_header_after`
* `flat_header_top`
* `flat_header_bottom`
* `flat_content_before`
* `flat_content_after`
* `flat_content_top`
* `flat_content_bottom`
* `flat_entry_before`
* `flat_entry_after`
* `flat_entry_top`
* `flat_entry_bottom`
* `flat_page_before`
* `flat_page_after`
* `flat_page_top`
* `flat_page_bottom`
* `flat_index_before`
* `flat_index_after`
* `flat_index_top`
* `flat_index_bottom`
* `flat_archive_before`
* `flat_archive_after`
* `flat_archive_top`
* `flat_archive_bottom`
* `flat_search_before`
* `flat_search_after`
* `flat_search_top`
* `flat_search_bottom`
* `flat_comments_before`
* `flat_comments_after`
* `flat_comments_top`
* `flat_comments_bottom`
* `flat_sidebar_before`
* `flat_sidebar_after`
* `flat_sidebar_top`
* `flat_sidebar_bottom`
* `flat_404_content`
* `flat_footer_before`
* `flat_footer_after`
* `flat_footer_top`
* `flat_footer_bottom`
* BONUS! All Theme Hook Alliance hooks are included!

### Available filters

* `flat_404_title` — (string) The title of the 404 Error page.
* `flat_comment_form_parameters` — (array) Parameters passed to `comment_form()` for customizing the comment form
* `flat_list_comments_parameters` — (array) Parameters passed to `wp_list_comments()` for customizing comments display
* `show_flat_credits` — (boolean) Whether to show the default `footer` credits block
