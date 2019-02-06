<?php


/**CREATING NEW POST TYPES */

function university_post_types(){
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
      'singula_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));
}
add_action('init', 'university_post_types');



?>