<?php
/**
 * soildcube Theme Customizer
 *
 * @package soildcube
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function soildcube_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'soildcube_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'soildcube_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_section('soildcube-footer', array(
        'title'	=> __('Footer Section','soildcube'),
        'description'	=> __('Select Pages from the dropdown for Footer section','soildcube'),
        'priority'	=> null
    ));

    $wp_customize->add_setting('footer-column1',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_integer',
    ));

    $wp_customize->add_control(	'footer-column1',array('type' => 'dropdown-pages',
        'label' => __('Column One','soildcube'),
        'description' => __( 'Please select pages for footer column one.', 'soildcube' ),
        'section' => 'soildcube-footer',
    ));

    $wp_customize->add_setting('footer-column2',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_integer',
    ));

    $wp_customize->add_control(	'footer-column2',array('type' => 'dropdown-pages',
        'label' => __('Column Two','soildcube'),
        'description' => __( 'Please select pages for footer column  Two.', 'soildcube' ),
        'section' => 'soildcube-footer',
    ));

    $wp_customize->add_setting('footer-column3',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_integer',
    ));

    $wp_customize->add_control(	'footer-column3',array('type' => 'dropdown-pages',
        'label' => __('Column Three','soildcube'),
        'description' => __( 'Please select pages for footer column Three.', 'soildcube' ),
        'section' => 'soildcube-footer',
    ));

    $wp_customize->add_setting('footer-social',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_integer',
    ));

    $wp_customize->add_control(	'footer-social',array('type' => 'checkbox',
        'label' => __('Social Icons','soildcube'),
        'description' => __( 'Please select to show social icons below footer column One.', 'soildcube' ),
        'section' => 'soildcube-footer',
    ));

    $wp_customize->add_section('soildcube-social', array(
        'title'	=> __('Social Networks','soildcube'),
        'description'	=> __('Please input your social networking sites/URLs','soildcube'),
        'priority'	=> null
    ));

    $wp_customize->add_setting('footer-social-twitter',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_text',
    ));

    $wp_customize->add_control(	'footer-social-twitter',array('type' => 'text',
        'label' => __('Tweeter:','soildcube'),
        'description' => __( 'Please input https://twitter.com/<b>your_twitter_handle</b>', 'soildcube' ),
        'section' => 'soildcube-social',
    ));

    $wp_customize->add_setting('footer-social-facebook',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_text',
    ));

    $wp_customize->add_control(	'footer-social-facebook',array('type' => 'text',
        'label' => __('Facebook:','soildcube'),
        'description' => __( 'Please input https://www.facebook.com/<b>Your_facebook_id</b>', 'soildcube' ),
        'section' => 'soildcube-social',
    ));

    $wp_customize->add_setting('footer-social-google-plus',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_text',
    ));

    $wp_customize->add_control(	'footer-social-google-plus',array('type' => 'text',
        'label' => __('Google plus:','soildcube'),
        'description' => __( 'Please input https://plus.google.com/<b>+Your_google_plus_id</b>', 'soildcube' ),
        'section' => 'soildcube-social',
    ));

    $wp_customize->add_setting('footer-social-pinterest',	array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'soildcube_sanitize_text',
    ));

    $wp_customize->add_control(	'footer-social-pinterest',array('type' => 'text',
        'label' => __('Pinterest:','soildcube'),
        'description' => __( 'Please input https://www.pinterest.com/<b>Your_pinterest_id</b>', 'soildcube' ),
        'section' => 'soildcube-social',
    ));
}
add_action( 'customize_register', 'soildcube_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function soildcube_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function soildcube_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function soildcube_customize_preview_js() {
	wp_enqueue_script( 'soildcube-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'soildcube_customize_preview_js' );

//Integer
function soildcube_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function soildcube_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}
