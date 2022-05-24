<?php
/**
 * Add image sizes
 */

function theme_setup_add_image_sizes() {
  //add_image_size ( 'big-thumb', 300, 300, array( 'center', 'center' ));
  add_image_size ( 'sd', 1280, 720 );
  add_image_size ( 'hd', 1920, 1080 );
};

add_action( 'after_setup_theme', 'theme_setup_add_image_sizes' );

