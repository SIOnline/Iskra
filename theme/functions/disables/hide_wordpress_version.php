<?php

//REMOVE META GENERATOR
function meta_remove_version() {
  return '';
}
add_filter('the_generator', 'meta_remove_version');

// REMOVE WORDPRESS VERSION
remove_action('wp_head', 'wp_generator');


//REMOVE SHORTLINK
remove_action( 'wp_head', 'wp_shortlink_wp_head');

