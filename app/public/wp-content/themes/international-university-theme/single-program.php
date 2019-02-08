<!-- Is used to a individual PROGRAM -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title();?></h1>
      <div class="page-banner__intro">
        <p>Don´t forget to replace me later!</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    <!-- METABOX -->
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program');?>">
        <i class="fa fa-home" aria-hidden="true"></i> All Programs</a> 
        <span class="metabox__main"><?php the_title();?></span>
      </p>
    </div>

    <div class="generic-content"><?php the_content();?></div>

    <!-- Related Professors -->
    <?php $relatedProfessors = new WP_Query(array(
        'posts_per_page' => 2,  // -1 means to get all posts from these post type..
        'post_type' => 'professor',
        'orderby' => 'title', // event date order
        'order' => 'ASC', // ascendent
        'meta_query' => array(  // to sort only actual events..
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' .get_the_ID() . '"' // the ID need to be between " " 
          )
        )
      ));
      ?>

      <?php if($relatedProfessors->have_posts()):?>
        <hr class="section-break"/>
        <h2 class="headline headline--medium"><?php echo get_the_title();?> Professors</h2>

        <ul class="professor-cards">
          <?php while($relatedProfessors -> have_posts()):?>
          <?php $relatedProfessors -> the_post();?>
            <li class="professor-card__list-item">
              <a class="professor-card" href="<?php the_permalink(); ?>">
                <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape') ?>">
                <span class="professor-card__name"><?php the_title(); ?></span>
              </a>
            </li>
          <!-- </div> -->
          <?php endwhile;?>
        </ul>

      <?php else:?>
          <hr class="section-break"/>
          <h4 class="headline headline--small">No Professors related to <?php echo get_the_title();?></h4>
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

    <?php if($homePageEvents->have_posts()):?>
      <hr class="section-break"/>
      <h2 class="headline headline--medium">Upcoming <?php echo get_the_title();?> Events</h2>

      <?php while($homePageEvents -> have_posts()):?>
      <?php $homePageEvents -> the_post();?>
        
      <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink();?>">
          <span class="event-summary__month"><?php 
            $eventDate = new DateTime(get_field('event_date', false, false)); // Need to have false, false..
            echo $eventDate->format('M');
          ?></span>
          <span class="event-summary__day"><?php echo $eventDate->format('d');?></span>  
        </a>

        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
            
            <!-- Check if there is excerpt or not -->
            <p><?php if(has_excerpt()):?>
                <?php echo get_the_excerpt() . '...';?>
              <?php else:?>
                <?php echo wp_trim_words( get_the_content(), 18, '...' );?>
              <?php endif;?>
              <a href="<?php the_permalink();?>" class="nu gray">Read more</a>
            </p>

        </div>
      </div>
      <?php endwhile;?>

    <?php else:?>
      <hr class="section-break"/>
      <h4 class="headline headline--small">No Events related to <?php echo get_the_title();?></h4>
    <?php endif;?>
  
  </div>


<?php endwhile;?>

<?php get_footer();?>