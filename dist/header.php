<?php
/**
 * Page headers
 *
 * Kicks off template display with the HTML `head` and default page boilerplate.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

pacific_hook_html_before();
?>
<html <?php language_attributes(); ?>>
<head>
	<?php pacific_hook_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<?php pacific_hook_head_bottom(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php pacific_hook_body_top(); ?>
<div id="page">
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div id="secondary" class="col-lg-3">
				<?php pacific_hook_header_before(); ?>
				<header id="masthead" class="site-header" role="banner">
					<?php pacific_hook_header_top(); ?>
					<div class="hgroup">
						<?php pacific_logo(); ?>
					</div>
					<button type="button" class="btn btn-link hidden-lg toggle-sidebar" data-toggle="offcanvas" aria-label="Sidebar"><?php _e( '<i class="fa fa-gear"></i>', 'pacific' ); ?></button>
					<button type="button" class="btn btn-link hidden-lg toggle-navigation" aria-label="Navigation Menu"><?php _e( '<i class="fa fa-bars"></i>', 'pacific' ); ?></button>
					<nav id="site-navigation" class="navigation main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container' => false ) ); ?>
					</nav>
					<?php pacific_hook_header_bottom(); ?>
				</header>
				<?php pacific_hook_header_after(); ?>

				<div class="sidebar-offcanvas">
<?php get_sidebar(); ?>
				</div>
			</div>

			<?php pacific_hook_content_before(); ?>
			<div id="primary" class="content-area col-lg-9" itemprop="mainContentOfPage">
				<?php pacific_hook_content_top(); ?>