<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lyttelton
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/a713b736e5.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lyttelton' ); ?></a>

	<header id="masthead" class="site-header">
		
		<!-- Image and text -->
		<nav id="site-top-bar" class="navbar navbar-dark bg-dark">

		<div class="site-branding">

			<?php 
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a class ="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a class ="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$lyttelton_description = get_bloginfo( 'description', 'display' );
			if ( $lyttelton_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $lyttelton_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'social-menu',
					'depth'           => 1,
					'container'       => 'ul',					
					'container_class' => 'collapse navbar-collapse',
					'menu_class'      => 'nav menu-social ',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			);
			?>
			<!-- #social-menu -->
	
				</nav>


		</nav>

		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light bg-light">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lyttelton' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'depth'           => 2,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'nav navbar-nav',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<i class="fas fa-user"></i> <!-- uses solid style -->
  <i class="far fa-user"></i> <!-- uses regular style -->
  <!--brand icon-->
  <i class="fab fa-github-square"></i> <!-- uses brands style -->
	</header><!-- #masthead -->
