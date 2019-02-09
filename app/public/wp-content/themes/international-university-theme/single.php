<!-- Single is used to a individual posts -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <!-- Function is in functions.php -->
  <?php pageBanner(array(
    'title' => get_the_title(),
    'photo' => 'https://cdn.pixabay.com/photo/2018/03/22/02/37/email-3249062_960_720.png'
  ))?> 

  <div class="container container--narrow page-section">
    <!-- METABOX -->
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog')?>">
        <i class="fa fa-home" aria-hidden="true"></i> Blog Home </a> 
        <span class="metabox__main">
          Posted by <?php the_author_posts_link();?> 
          on <?php the_time('y/n/j');?> 
          <?php echo get_the_category_list(', ');?>
        </span>
      </p>
    </div>

    <div class="generic-content">
      <?php the_content();?>
    </div>
  
  </div>


<?php endwhile;?>

<?php get_footer();?>