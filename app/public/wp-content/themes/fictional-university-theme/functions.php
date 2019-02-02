<!-- FUNCTIONS is where we have contact with the WordPress system -->

<!--  -->

<?php

/** arg1 = what type of instruction we give to wordpress 
 *  arg2 = the name of the function I want to run
 * Wordpress decide when it will run..  
 * microtime() avoid caching in the webbrowser! DONT USE in REAL PROJECTS just version 1.0**************/
function university_files(){
  wp_enqueue_style('university_main_style', get_stylesheet_uri(), NULL, microtime()); /** ('nickname', function that get ./style.css) */
  wp_enqueue_style('font-awesome',  '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); /**Cut the https: */
  wp_enqueue_style('custom-google-font',  '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script('main-university-js',  get_theme_file_uri('./js/scripts-bundled.js'), NULL, microtime(), true); /** Null = no dependencies, version, true = render bottom on the footer, not in header */
}
add_action('wp_enqueue_scripts', 'university_files'); 


/** function to set automatic the page title */
function university_features(){
  add_theme_support('title-tag');
  register_nav_menu('headerMenuLocation', 'Header Menu Location');/**DINAMIC MENU */
  // register_nav_menu('footerLocationOne', 'Footer Location One');/**DINAMIC MENU */
  // register_nav_menu('footerLocationTwo', 'Footer Location Two');/**DINAMIC MENU */
}
add_action('after_setup_theme', 'university_features');










?>