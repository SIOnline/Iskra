<?php
function registerCustomStyles($name) {

  if ($name) {
    if (!strpos($name, '.css')) {
      $fileName = $name . '.css';
    } else {
      $fileName = $name;
    }
    $path = get_template_directory_uri() . '/build/' . $fileName;
    wp_enqueue_style( $name, $path, array(), THEME_VERSION, 'all' );
  }

}
