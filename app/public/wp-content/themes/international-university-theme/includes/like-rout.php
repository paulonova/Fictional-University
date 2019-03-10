<?php

function universityLikeRouts(){
  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}
add_action('rest_api_init', 'universityLikeRouts');


function createLike($data){

  // if(current_user_can('publish_note'))  true/false based on current_user and a roll.
  if(is_user_logged_in()){  

    $professor = sanitize_text_field($data['professorId']);

    $existQuery = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'liked_professor_id',
          'compare' => '=',
          'value' => $professor
        )
      )
    ));

    if($existQuery->found_posts == 0 AND get_post_type($professor) == 'professor'){
      return wp_insert_post(array(  // returns the ID of the new post
        'post_type' => 'like',
        'post_status' => 'publish', // finalized post, no draft
        'post_title' => 'Like created to - ' .  get_the_title($professor),
        // 'post_content' => 'Hello test 123'
        'meta_input' => array(
          'liked_professor_id' => $professor
        )    
    ));

    }else{
      die('Invalid professor id.');
    }    
    
  }else{
    die("Olny logged in users can create a like.");
  }  
}

function deleteLike($data){
  $likeId = sanitize_text_field($data['like']);
  //To be shure that the post belong to the current user and to a "like"
  if(get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like'){
    wp_delete_post($likeId, true); // true means the the like will be deleted not going to trash.
    return 'Congrats! like deleted';

  }else{
    die('You do not have permission to delete that.');
  }
}