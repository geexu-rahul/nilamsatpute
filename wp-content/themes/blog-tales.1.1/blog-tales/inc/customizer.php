<?php
/**
 * Blog Tales Theme Customizer
 *
 * @package blog_tales
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_tales_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load sanitize functions.
	include get_template_directory() . '/inc/sanitize.php';

	include get_template_directory() . '/inc/upsell/upsell-section.php';

	// Load theme options.
	include get_template_directory() . '/inc/customizer/theme-options.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog_tales_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog_tales_customize_partial_blogdescription',
		) );
	}

	$wp_customize->register_section_type( 'blog_tales_Customize_Upsell_Section' );

	// Register section.
	$wp_customize->add_section(
		new blog_tales_Customize_Upsell_Section(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Blog Tales Pro', 'blog-tales' ),
				'pro_text' => esc_html__( 'Buy Pro', 'blog-tales' ),
				'pro_url'  => 'https://kantipurthemes.com/downloads/blog-tales-pro/',
				'priority' => 10,
			)
		)
	);
}
add_action( 'customize_register', 'blog_tales_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_tales_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_tales_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_tales_customize_preview_js() {
	wp_enqueue_script( 'blog-tales-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_tales_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function blog_tales_customizer_control_scripts() {

	wp_enqueue_style( 'blog-tales-customize-controls', get_template_directory_uri() . '/assets/css/customize-controls.css', '', '1.0.0' );

	wp_enqueue_script( 'blog-tales-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'blog_tales_customizer_control_scripts', 0 );
