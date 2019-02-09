<!-- This page handle the Categories page as author and awards -->


<?php get_header();?>

<?php pageBanner(array(
    'title' => get_the_archive_title(),
    'subtitle' => get_the_archive_description(),
    'photo' => 'https://cdn.pixabay.com/photo/2017/03/07/13/02/thought-2123971_960_720.jpg'
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