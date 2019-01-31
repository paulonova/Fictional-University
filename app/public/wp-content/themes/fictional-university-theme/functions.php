<!-- FUNCTIONS is where we have contact with the WordPress system -->

<!--  -->

<?php

/** arg1 = what type of instruction we give to wordpress 
 *  arg2 = the name of the function I want to run
 * Wordpress decide when it will run..  **************/
function university_files(){
  wp_enqueue_style('university_main_style', get_stylesheet_uri()); /** ('nickname', function that get ./style.css) */
  wp_enqueue_style('font-awesome',  '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); /**Cut the https: */
  wp_enqueue_style('custom-google-font',  '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}
add_action('wp_enqueue_scripts', 'university_files'); 











?>