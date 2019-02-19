<!-- This page handle the Blog page section showing few posts -->


<?php get_header();?>

<?php pageBanner(array(
    'title' => 'Welcome to our Blog!',
    'subtitle' => 'Keep up with our latest news.',
    'photo' => 'https://cdn.pixabay.com/photo/2016/02/06/09/56/science-1182713__340.jpg'
  ))?>  

  <div class="container container--narrow page-section">
    <?php while(have_posts()): ?>
    <?php the_post(); ?>

      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

        <div class="metabox">
          <p>Posted by <?php the_author_posts_link();?> on <?php the_time('y/n/j');?> in <?php echo get_the_category_list(', ');?></p>
        </div>
        <div class="generic-content">
          <?php the_excerpt();?>
          <p><a class="btn btn--blue" href="<?php the_permalink();?>">Continue reading &raquo;</a></p>
        </div>
      </div>
    <?php endwhile; ?>

    <!-- Pagination -->
    <?php echo paginate_links();?>
  </div>



<?php get_footer();?>