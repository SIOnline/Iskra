<?php
// disable gutenberg frontend styles @ https://m0n.co/15
function disable_gutenberg_wp_enqueue_scripts() {

	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');

	wp_dequeue_style('wc-block-style'); // disable woocommerce frontend block styles
	wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles

    wp_dequeue_style( 'global-styles' );
}
add_filter('wp_enqueue_scripts', 'disable_gutenberg_wp_enqueue_scripts', 100);
