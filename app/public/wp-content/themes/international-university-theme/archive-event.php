<!-- This page handle the All Events page -->

<?php get_header();?>

  <?php pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'See whats is going on in our world.',
    'photo' => 'http://www.wheelersburgfaithbaptistchurch.com/images/connect/eventsbkgrnd.jpg'
  ))?>

  <div class="container container--narrow page-section">
    <?php while(have_posts()): ?>
    <?php the_post(); ?>      
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

    <!-- Pagination -->
    <?php echo paginate_links();?>
    <hr class="section-break">
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>">Check out our past events archive</a></p>
  </div>



<?php get_footer();?>