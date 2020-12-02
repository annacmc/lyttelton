<?php
/**
 * Lyttelton Theme Customizer
 *
 * @package Lyttelton
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lyttelton_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* 
	* Add Lyttelton Theme Settings to Customizer
	*/
	   $wp_customize->add_section( 'lyttelton-settings', array(
            'title'    => __( 'Theme Settings', 'lyttelton'),
            'priority' => 110,
    ) );
 /* 
	* add header align setting
	*/
    $wp_customize->add_setting( 'header-align', array(
        'default'    => get_theme_mod( 'header-align' ),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
	) );

	 /* 
	* add header style setting
	*/
    $wp_customize->add_setting( 'header-style', array(
        'default'    => get_theme_mod( 'header-style' ),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
	) );

		 /* 
	* add primary color style setting
	*/
    $wp_customize->add_setting( 'primary-color', array(
        'default'    => get_theme_mod( 'primary-color' ),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
	) );
	
	 /* 
	* add header align control
	*/
 
    $wp_customize->add_control( 'header-align', array(
		'label'      => __( 'Header Layout', 'lyttelton' ),
		'description' => __( 'This is a custom header alignment selection.', 'lyttelton' ),
		'section'    => 'lyttelton-settings',
		'type' => 'radio',
		'choices' => array(
			'left' => __( 'Left Aligned' ),
			'center' => __( 'Center Aligned' ),
		  ),
	) );
	
		 /* 
	* add header style control
	*/
 
    $wp_customize->add_control( 'header-style', array(
		'label'      => __( 'Header Style', 'lyttelton' ),
		'description' => __( 'This is a custom header alignment selection.', 'lyttelton' ),
		'section'    => 'lyttelton-settings',
		'type' => 'radio',
		'choices' => array(
			'light' => __( 'Light Header' ),
			'dark' => __( 'Dark Header' ),
		  ),
	) );
	
	/* 
	* add primary color picker
	*/

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'primary_color', 
		array(
			'label'      => __( 'Primary Color', 'lyttelton' ),
			'section'    => 'lyttelton-settings',
			'settings'   => 'primary-color',
		) ) 
	);


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'lyttelton_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'lyttelton_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'lyttelton_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lyttelton_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lyttelton_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lyttelton_customize_preview_js() {
	wp_enqueue_script( 'lyttelton-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'lyttelton_customize_preview_js' );


/** 
 * Adds header color styling into Head
 */

function lyttelton_customize_header_style()
{
	$header_style = get_theme_mod('header-style');
	$primary_color = get_theme_mod('primary-color');
	if ($header_style == "dark"){ 
   	 ?>
         <style type="text/css">
			.primary-bg {
				background-color:<?php echo $primary_color;?>;
			}

         </style>
    <?php
	}
}
add_action( 'wp_head', 'lyttelton_customize_header_style');


