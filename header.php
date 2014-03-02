<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div id="secondary" class="col-lg-3">
				<header id="masthead" class="site-header" role="banner">
					<div class="hgroup">
						<?php flat_logo(); ?>
					</div>
					<button type="button" class="btn btn-link hidden-lg toggle-sidebar" data-toggle="offcanvas"><i class="fa fa-gear"></i></button>
					<button type="button" class="btn btn-link hidden-lg toggle-navigation"><i class="fa fa-bars"></i></button>
					<nav id="site-navigation" class="navigation main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container' => false ) ); ?>
					</nav>
				</header>
				
				<div class="sidebar-offcanvas">
					<?php get_sidebar(); ?>
				</div>
			</div>
			<div id="primary" class="content-area col-lg-9">