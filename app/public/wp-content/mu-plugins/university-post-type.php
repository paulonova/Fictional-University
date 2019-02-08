<?php


/**CREATING NEW POST TYPES */

function university_post_types(){

  //Create EVENT post type
  register_post_type('event', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => true,  /** to suport archives, allEvents */
    'rewrite' => array('slug' => 'events'),
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  //Create PROGRAM post type
  register_post_type('program', array(
    'supports' => array('title', 'editor'),
    'has_archive' => true,  /** to suport archives, allprograms */
    'rewrite' => array('slug' => 'programs'),
    'public' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

  //Create PROFESSOR post type
  register_post_type('professor', array(
    'supports' => array('title', 'editor', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Professors',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));
}
add_action('init', 'university_post_types');



?>