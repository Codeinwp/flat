=== Pacific ===
Author: Rick Beckman
Author URL: http://www.yoarts.com/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: black, blue, gray, white, light, two-columns, left-sidebar, responsive-layout, accessibility-ready, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-images, microformats, sticky-post, threaded-comments, translation-ready
Tested up to: 4.1.1

## Description

Pacific is a responsive WordPress theme designed by YoArts. We would like to say that Pacific is both beautiful and charming at the same time.

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

Pacific is built with the following resources:

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

## Customization

Pacific is able to be customized extensively by the [WordPress hooks & filters API](http://codex.wordpress.org/Plugin_API), which is a fancy way of saying that without creating a child theme, you have the freedom to add, remove, and change a lot of what makes Pacific _Pacific_. In addition to the default hooks & filters that just about any WordPress theme has available, Pacific is equipped with the following:

### Available hooks

* `pacific_html_before`
* `pacific_head_top`
* `pacific_head_bottom`
* `pacific_body_top`
* `pacific_body_bottom`
* `pacific_header_before`
* `pacific_header_after`
* `pacific_header_top`
* `pacific_header_bottom`
* `pacific_content_before`
* `pacific_content_after`
* `pacific_content_top`
* `pacific_content_bottom`
* `pacific_entry_before`
* `pacific_entry_after`
* `pacific_entry_top`
* `pacific_entry_bottom`
* `pacific_page_before`
* `pacific_page_after`
* `pacific_page_top`
* `pacific_page_bottom`
* `pacific_index_before`
* `pacific_index_after`
* `pacific_index_top`
* `pacific_index_bottom`
* `pacific_archive_before`
* `pacific_archive_after`
* `pacific_archive_top`
* `pacific_archive_bottom`
* `pacific_search_before`
* `pacific_search_after`
* `pacific_search_top`
* `pacific_search_bottom`
* `pacific_comments_before`
* `pacific_comments_after`
* `pacific_comments_top`
* `pacific_comments_bottom`
* `pacific_sidebar_before`
* `pacific_sidebar_after`
* `pacific_sidebar_top`
* `pacific_sidebar_bottom`
* `pacific_404_content`
* `pacific_footer_before`
* `pacific_footer_after`
* `pacific_footer_top`
* `pacific_footer_bottom`
* BONUS! All Theme Hook Alliance hooks are included!

### Available filters

* `pacific_404_title` — (string) The title of the 404 Error page.
* `pacific_comment_form_parameters` — (array) Parameters passed to `comment_form()` for customizing the comment form
* `pacific_list_comments_parameters` — (array) Parameters passed to `wp_list_comments()` for customizing comments display
* `show_pacific_credits` — (boolean) Whether to show the default `footer` credits block