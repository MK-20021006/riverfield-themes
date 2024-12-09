<?php

do_action( 'get_header' ); ?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
global $lightning_theme_options;
$lightning_theme_options = get_option( 'lightning_theme_options' );
?>
<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/scroll-hint@latest/css/scroll-hint.css">
<script src="https://unpkg.com/scroll-hint@latest/js/scroll-hint.min.js"></script>


</head>
<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#main"><?php _e( 'Skip to the content', 'lightning' ); ?></a>
<a class="skip-link screen-reader-text" href="#vk-mobile-nav"><?php _e( 'Skip to the Navigation', 'lightning' ); ?></a>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
