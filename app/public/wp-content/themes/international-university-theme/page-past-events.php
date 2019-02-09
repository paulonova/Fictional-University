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
      <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink();?>">
          <span class="event-summary__month"><?php
            $eventDate = new DateTime(get_field('event_date', false, false));
            echo $eventDate->format('M');
          ?></span>
          <span class="event-summary__day"><?php  echo $eventDate->format('d');?></span>  
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
          <p><?php echo wp_trim_words( get_the_content(), 18, '...' );?> 
            <a href="<?php the_permalink();?>" class="nu gray">Learn more</a>
          </p>
        </div>
      </div>
    <?php endwhile; ?>

    <!-- Pagination for created Custom Types-->
    <?php echo paginate_links(array(
      'total' => $pastEvents->max_num_pages
    ));?>
  </div>



<?php get_footer();?>