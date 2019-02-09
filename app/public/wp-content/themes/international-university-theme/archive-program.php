<!-- This page handle the All Programs page -->

<?php get_header();?>

<?php pageBanner(array(
    'title' => 'All Programs',
    'subtitle' => 'There is somthing for everyone. Have a look around!',
    'photo' => 'https://cdn.pixabay.com/photo/2015/11/15/07/47/geometry-1044090__340.jpg'
  ))?>

  <div class="container container--narrow page-section">
    <ul class="link-list min-list">
      <?php while(have_posts()): ?>
      <?php the_post(); ?>
        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>        
      <?php endwhile; ?>    
    </ul>
    

    <!-- Pagination -->
    <?php echo paginate_links();?>
  </div>



<?php get_footer();?>