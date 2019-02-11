<!-- Is used to a individual CAMPUS -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <!-- Function is in functions.php -->
  <?php pageBanner(array(
    'title' => get_the_title(),
    'photo' => 'https://cdn.pixabay.com/photo/2016/11/08/12/19/university-of-iowa-1808151_960_720.jpg'
  ))?> 

  <div class="container container--narrow page-section">
    <!-- METABOX -->
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus');?>">
        <i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> 
        <span class="metabox__main"><?php the_title();?></span>
      </p>
    </div>

    <div class="generic-content"><?php the_content();?></div>

      <div class="acf-map">
        <?php $mapLocation = get_field('map_location');?>
          <!-- Javascript can have access to the lat and lng -->
          <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">    
            <h3><?php the_title();?></h3>
            <p><?php echo $mapLocation['address']?></p>  
          </div>         
      </div>


    <!-- Related Professors -->
    <?php $relatedPrograms = new WP_Query(array(
        'posts_per_page' => 2,  // -1 means to get all posts from these post type..
        'post_type' => 'program',
        'orderby' => 'title', // event date order
        'order' => 'ASC', // ascendent
        'meta_query' => array(  // to sort only actual events..
          array(
            'key' => 'related_campus',
            'compare' => 'LIKE',
            'value' => '"' .get_the_ID() . '"' // the ID need to be between " " 
          )
        )
      ));
      ?>

      <?php if($relatedPrograms->have_posts()):?>
        <hr class="section-break"/>
        <h2 class="headline headline--medium">Programs Available is this Campus</h2>

        <ul class="min-list link-list">
          <?php while($relatedPrograms -> have_posts()):?>
          <?php $relatedPrograms -> the_post();?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
          <!-- </div> -->
          <?php endwhile;?>
        </ul>

      <?php else:?>
          <hr class="section-break"/>
          <h4 class="headline headline--small">No Programs related to <?php echo get_the_title();?></h4>
      <?php endif;?>

      <!-- Very IMPORTANT -->
      <?php wp_reset_postdata();?> 

    <!-- Related Events -->
    <?php $today = date('Ymd');
      $homePageEvents = new WP_Query(array(
        'posts_per_page' => 2,  // -1 means to get all posts from these post type..
        'post_type' => 'event',
        'meta_key' => 'event_date', // event date order
        'orderby' => 'meta_value_num', // event date order
        'order' => 'ASC', // ascendent
        'meta_query' => array(  // to sort only actual events..
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          ),
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' .get_the_ID() . '"' // the ID need to be between " " 
          )
        )
      ));
    ?>

    <?php wp_reset_postdata();?>    
  
  </div>

<?php endwhile;?>

<?php get_footer();?>