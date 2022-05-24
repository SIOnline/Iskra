<!doctype html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,user-scalable=no,minimum-scale=1,maximum-scale=1">
    <meta name="theme-color" content="#000000">
	<?php registerCustomStyles('Global'); ?>
	<?php registerCustomStyles('Component-Header'); ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> id="top">

  <?php
    $header = new Header();
    $header->render();
  ?>
