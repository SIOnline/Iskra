<?php 

/**
 * gutenberg styles
 */

function misha_gutenberg_css(){

	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' ); // tries to include style-editor.css directly from your theme folder

}

add_action( 'after_setup_theme', 'misha_gutenberg_css' );

/**
 *  
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
    'ExampleSection'
];

foreach ($blocks as $block) {
    require_once "src/Blocks/$block/$block.php";
    new $block(); 
}
