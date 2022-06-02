<?php

define('THEME_VERSION', wp_get_theme()->Version);

$path = 'functions/';

$core = 'core/';
	require $path . $core . 'register_custom_styles.php';
	require $path . $core . 'svg_support.php';

$disables = 'disables/';
	require $path . $disables . 'disable_gutenberg_frontend_styles.php';
	require $path . $disables . 'disable_comments.php';
	require $path . $disables . 'disable_emojis.php';
	require $path . $disables . 'remove_menu_gap.php';
	require $path . $disables . 'hide_wordpress_version.php';

$settings = 'settings/';
	require $path . $settings . 'add_image_size.php';
	require $path . $settings . 'media_sanitize_names.php';
	require $path . $settings . 'theme_setup.php';

$plugin_helpers = 'plugin_helpers/';
	require $path . $plugin_helpers . 'acf.php';


/**
 * Gutenberg Include styles
 */

function iskra_gutenberg_css(){
	add_theme_support( 'editor-styles' );
	add_editor_style( 'build/Editor.css' );
}

add_action( 'after_setup_theme', 'iskra_gutenberg_css' );

/**
 * Gutenberg Custom categories
 */
function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {

		$category_headings = array(
			'slug'  => 'header',
			'title' => __( 'Headers', 'starter-theme' ),
			'icon'  => null,
		);

		$category_sections = array(
			'slug' => 'sections',
			'title' => __( 'Sections', 'starter-theme' ),
			'icon' => null,
		);

	array_unshift(
		$block_categories,
		$category_headings,
		$category_sections
	);
	return $block_categories;
}

add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 1, 2 );

/**
 * Register blocks
 */
$blocks = [
	'Example',
	'HeroHome',
	'PhotoText',
];

foreach ($blocks as $block) {
	require_once "src/Blocks/$block/$block.php";
	new $block();
}
$components = [
	'Header',
	'Footer',
];

foreach ($components as $component) {
	require_once "src/Components/$component/$component.php";
	new $component();
}
