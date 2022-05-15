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
    
        $category_heading = array(
            'slug'  => 'header',
            'title' => __( 'Header', 'starter-theme' ),
            'icon'  => null,
        );

        $category_blocks = array(
            'slug' => 'sections',
            'title' => __( 'Sections', 'starter-theme' ),
            'icon' => null,
        );
        
    array_unshift( 
        $block_categories, 
        $category_heading, 
        $category_blocks
    );
    return $block_categories;
}
 
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 1, 2 );

/**
 * 
*function my_plugin_block_categories( $categories, $post ) {
*   $custom_category_one = array(
*     'slug' => 'header',
*     'title' => __( 'Headers', 'my-plugin' ),
*     //'icon'  => 'admin-home',
*   );
* 
*   array_unshift( $categories, $custom_category_one, $custom_category_two, $custom_category_three );
*   return $categories;
* }
* add_filter( 'block_categories_all', 'my_plugin_block_categories', 10, 2 );
 */

/**
 * 
 */
$blocks = [
    'Example',
    'ExampleSection'
];


foreach ($blocks as $block) {
    require 'src/Blocks/' . $block . '/' . $block . '.php';
    new $block(); 
}

