<!-- This page handle the Campuses page with Google Map -->

<?php get_header();?>

<?php pageBanner(array(
    'title' => 'Our Campuses',
    'subtitle' => get_field('page_banner_subtitle'),
    'photo' => 'https://cdn.pixabay.com/photo/2017/05/15/01/02/travel-2313444__340.jpg'
  ))?>

  <div class="container container--narrow page-section">

    <div class="acf-map">
      <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <?php $mapLocation = get_field('map_location');?>
        <!-- Javascript can have access to the lat and lng -->
        <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">    
          <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
          <p><?php echo $mapLocation['address']?></p>  
        </div>    
      <?php endwhile; ?>          
    </div>
    
  </div>



<?php get_footer();?>