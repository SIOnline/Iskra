<?php

/* THEME SETUP */
if ( ! function_exists( 'theme_setup' ) ) :
  function theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    /* REGISTER MENUS */
    register_nav_menus( array(
      'menu-navbar'       => esc_html__( 'Navbar menu', 'startet-theme' ),
    ));

    /* IMAGES - custom sizes */
    //add_image_size ( 'big-thumb', 300, 300, array( 'center', 'center' ));
    add_image_size ( 'sd', 1280, 720 );
    add_image_size ( 'hd', 1920, 1080 );
  }
endif;
add_action( 'after_setup_theme', 'theme_setup' );
