<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package formationpro
 * @since formationpro 1.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="joe">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrap">
		<div id="page" class="hfeed site">

			<?php do_action( 'before' ); ?>

		    <div id="masthead-wrap">

			    <div id="topbar_container">
				    <div class="topbar">
					    <div class='topbar_content_left'>
							<div class="contact telnumber"><i class="fa fa-phone"></i> 630-403-8356</div>
							<div class="contact email"><i class="fa fa-envelope"></i> <a href="mailto:ContactUs@emailautonomy.com">contactus@emailautonomy.com</a></div>
							<div class="contact address"><i class="fa fa-map-marker"></i> <a href="https://goo.gl/maps/hEsiVp9L4JR2" target="_blank">5120 Belmont Rd., Downers Grove, IL</a></div>
						</div>

				    	<div class="topbar_content_right"><?php get_template_part( 'inc/socmed' ); ?></div>
				    </div>
			    </div>

				<header id="masthead" class="site-header header_container" role="banner">

						<div class="site-logo">
							<!-- <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'formationpro_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a> -->
							<a href="http://staging.autonomy.works/" title="AutonomyWorks" rel="home"><img src="http://www.autonomy.works/wp-content/uploads/2015/10/logo.png" alt="AutonomyWorks"></a>
						</div>



					<nav role="navigation" class="site-navigation main-navigation">

						<h1 class="assistive-text"><a href="#" title="<?php _e('Navigation Toggle', 'formationpro'); ?>"><?php _e( 'Menu', 'formationpro' ); ?></a></h1>

						<div class="assistive-text skip-link">
							<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'formationpro' ); ?>"><?php _e( 'Skip to content', 'formationpro' ); ?></a>
						</div>

						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

					</nav><!-- .site-navigation .main-navigation -->

				</header><!-- #masthead .site-header -->

			</div><!-- #masthead-wrap -->

		    <div class="header-image">
				<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ): ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>"/>
						</a>
				<?php endif; ?>
			</div>

			<div id="main" class="site-main">