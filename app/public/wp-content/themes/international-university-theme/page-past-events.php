<!-- This page handle the All Past Events page -->

<?php get_header();?>

  <?php pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'A recap of our past events',
    'photo' => 'https://cdn.pixabay.com/photo/2015/03/30/19/27/time-699965_960_720.jpg'
  ))?> 

  <div class="container container--narrow page-section">

    <?php 
      $today = date('Ymd');
      $pastEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1), // make sure that pagination will show the correct page..
        //'posts_per_page' => 1,  // -1 means to get all posts from these post type..
        'post_type' => 'event',
        'meta_key' => 'event_date', // event date order
        'orderby' => 'meta_value_num', // event date order
        'order' => 'ASC', // ascendent
        'meta_query' => array(  // to sort only actual events..
          array(
            'key' => 'event_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));
    ?>
    <?php while($pastEvents->have_posts()): ?>
    <?php $pastEvents->the_post(); ?> 

      <!-- get the template from content-event.php  -->
      <?php get_template_part('template-parts/content', 'event')?>

    <?php endwhile; ?>

    <!-- Pagination for created Custom Types-->
    <?php echo paginate_links(array(
      'total' => $pastEvents->max_num_pages
    ));?>
  </div>



<?php get_footer();?>