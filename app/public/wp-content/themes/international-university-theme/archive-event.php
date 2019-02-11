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

      <!-- get the template from content-event.php  -->
      <?php get_template_part('template-parts/content', 'event')?>

    <?php endwhile; ?>

    <!-- Pagination -->
    <?php echo paginate_links();?>
    <hr class="section-break">
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>">Check out our past events archive</a></p>
  </div>



<?php get_footer();?>