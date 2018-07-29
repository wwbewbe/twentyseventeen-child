<?php

/*
 * Editor Stylesheet Setting
 */
add_editor_style( get_stylesheet_directory_uri() . '/editor-style.css?ver=' . date( 'U' ) );
add_editor_style( 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );
/*
 * Child Theme Setting
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
    wp_enqueue_style( 'child-fonts-google-css', 'https://fonts.googleapis.com/css?family=Fredericka+the+Great|Open+Sans:300,400,600,700,800|Roboto+Mono:100,300,400,500,700|Roboto:100,300,400,500,700,900' );
    wp_enqueue_style( 'child-font-mplus1p-css', 'https://fonts.googleapis.com/earlyaccess/mplus1p.css' );
  	wp_enqueue_style( 'child-font-roundedmplus1c-css', 'https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css' );
    wp_enqueue_style( 'child-font-awesome-css', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );
}
/*
 * Set New Theme Setup
 */
add_action('after_setup_theme', 'child_theme_setup');
function child_theme_setup(){
	/* language setup */
   load_child_theme_textdomain('twentyseventeenchild', get_stylesheet_directory() . '/languages' );
}

?>
