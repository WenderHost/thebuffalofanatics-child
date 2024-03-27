<?php
/**
 * The Buffalo Fanatic (Zox News Child) Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thebuffalofanatic-child
 */

add_action( 'wp_enqueue_scripts', 'zox_news_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function zox_news_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'zox-news-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'thebuffalofanatic-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ 'zox-news-style' ]
	);
}
