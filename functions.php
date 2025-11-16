<?php
/**
 * Lumen Theme Functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function lumen_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/styles.css' );
}
add_action( 'after_setup_theme', 'lumen_add_editor_styles' );

/**
 * Enqueue custom styles
 */
function lumen_enqueue_styles() {
	wp_enqueue_style(
		'lumen-styles',
		get_template_directory_uri() . '/assets/css/styles.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'lumen_enqueue_styles' );

/**
 * Register custom block styles
 */
function lumen_register_block_styles() {
	// Stat item with gradient underline
	register_block_style(
		'core/tag-cloud',
		array(
			'name'  => 'button-style',
			'label' => __( 'Button Style', 'lumen' ),
		)
	);
}
add_action( 'init', 'lumen_register_block_styles' );

/**
 * Register custom block patterns category
 */
function lumen_register_pattern_categories() {
    register_block_pattern_category(
        'lumen-patterns',
        array( 'label' => __( 'Lumen Patterns', 'lumen' ) )
    );
}
add_action( 'init', 'lumen_register_pattern_categories' );
