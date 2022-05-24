<?php

/**
 * Add SVG support
 * - uploading
 * - bypassing svg without header
 * - remove svg size
 */

function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );

  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function correct_file_types( $data, $file, $filename, $mimes, $real_mime ) {

  if ( ! empty( $data['ext'] ) && ! empty( $data['type'] ) ) {
    return $data;
  }

  $wp_file_type = wp_check_filetype( $filename, $mimes );

  if ( 'svg' === $wp_file_type['ext'] ) {
    $data['ext']  = 'svg';
    $data['type'] = 'image/svg+xml';
  }

  return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'correct_file_types' , 10, 5 );

function fix_svg_size_attributes( $out, $id ) {
  $image_url  = wp_get_attachment_url( $id );
  $file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );

  if ( is_admin() || 'svg' !== $file_ext ) {
    return false;
  }

  return array( $image_url, null, null, false );
}
add_filter( 'image_downsize', 'fix_svg_size_attributes', 10, 2 );
