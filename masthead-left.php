<header id="masthead" class="site-header">
		
        <?php
        $header_style = get_theme_mod('header-style');
        $header_align = get_theme_mod('header-align');
	    if ($header_style == "dark"){ ?>
            <nav id="site-top-bar" class="navbar">
        <?php }
        else { ?>
            <nav id="site-top-bar" class="navbar">
        <?php }
        ?>

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
						'menu_class'      => 'nav menu-social',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				);
			?>
			<!-- #social-menu -->

			
		</nav>
        
        		
        <?php
        $header_style = get_theme_mod('header-style');
        $primary_color = get_theme_mod('primary-color');
	    if ($header_style == "dark"){ ?>
            <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg primary-bg">
        <?php }
        else { ?>
            		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg">
        <?php }
        ?>
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
        </nav>
        <?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
    </div>
<?php endif; ?>
	</header><!-- #masthead -->
