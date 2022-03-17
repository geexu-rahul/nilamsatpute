<?php
/**
 * Theme Options.
 *
 * @package blog_tales
 */

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'blog-tales' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Sidebar section
$wp_customize->add_section('section_sidebar', array(    
	'title'       => __('Sidebar Options', 'blog-tales'),
	'panel'       => 'theme_option_panel'    
));

// Page Sidebar Option
$wp_customize->add_setting('page_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_tales_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('page_sidebar', 
	array(		
	'label' 	=> __('Page Sidebar', 'blog-tales'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'page_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'blog-tales'),						
		'right-sidebar' => __( 'Right Sidebar', 'blog-tales'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'blog-tales'),	
		),	
	)
);

// Single Post Sidebar Option
$wp_customize->add_setting('single_post_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_tales_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('single_post_sidebar', 
	array(		
	'label' 	=> __('Single Post Sidebar', 'blog-tales'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'single_post_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'blog-tales'),						
		'right-sidebar' => __( 'Right Sidebar', 'blog-tales'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'blog-tales'),	
		),	
	)
);

// Blog Sidebar Option
$wp_customize->add_setting('blog_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_tales_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('blog_sidebar', 
	array(		
	'label' 	=> __('Blog Sidebar', 'blog-tales'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'blog_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'blog-tales'),						
		'right-sidebar' => __( 'Right Sidebar', 'blog-tales'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'blog-tales'),	
		),	
	)
);

// Archive Sidebar Option
$wp_customize->add_setting('archive_sidebar', 
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_tales_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('archive_sidebar', 
	array(		
	'label' 	=> __('Archive Sidebar', 'blog-tales'),
	'section' 	=> 'section_sidebar',
	'settings'  => 'archive_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'left-sidebar' 	=> __( 'Left Sidebar', 'blog-tales'),						
		'right-sidebar' => __( 'Right Sidebar', 'blog-tales'),	
		'no-sidebar' 	=> __( 'No Sidebar', 'blog-tales'),	
		),	
	)
);

// Excerpt Length
$wp_customize->add_section('section_excerpt_length', 
	array(    
	'title'       => __('Excerpt Length', 'blog-tales'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'excerpt_length', array(
	'default'           => '50',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_tales_sanitize_number_range',
	'transport'         => 'refresh',
) );

$wp_customize->add_control( 'excerpt_length', array(
	'label'       => __( 'Excerpt Length', 'blog-tales' ),
	'description' => __( 'Note: Min 5 & Max 100.', 'blog-tales' ),
	'section'     => 'section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 5, 'max' => 100, 'style' => 'width: 55px;' ),
) );