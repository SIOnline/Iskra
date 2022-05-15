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

