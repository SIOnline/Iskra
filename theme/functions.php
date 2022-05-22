<?php

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
];

foreach ($blocks as $block) {
    require_once "src/Blocks/$block/$block.php";
    new $block();
}
