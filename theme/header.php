<!doctype html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,user-scalable=no,minimum-scale=1,maximum-scale=1">
    <meta name="theme-color" content="#000000">
	<?php registerCustomStyles('Global'); ?>
	<?php registerCustomStyles('Component-Header'); ?>
    <?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300;400;500;600;700&family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">
  </head>

  <body <?php body_class(); ?> id="top">

  <?php
    $header = new Header();
    $header->render();
  ?>
