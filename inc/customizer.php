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
 
    $wp_customize->add_setting( 'lyttelton', array(
        'default'    => get_option( 'lyttelton-settings' ),
        'type'       => 'option',
        'capability' => 'manage_options',
    ) );
 
    $wp_customize->add_control( 'lyttelton', array(
		'label'      => __( 'Header Style', 'lyttelton' ),
		'description' => __( 'This is a custom header alignment selection.', 'lyttelton' ),
		'section'    => 'lyttelton-settings',
		'type' => 'radio',
		'choices' => array(
			'left' => __( 'Left Aligned' ),
			'center' => __( 'Center Aligned' ),
		  ),
    ) );



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

