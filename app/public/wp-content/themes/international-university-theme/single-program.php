<!-- Is used to a individual PROGRAM -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <!-- Function is in functions.php -->
  <?php pageBanner(array(
    'title' => get_the_title(),
    'photo' => 'https://cdn.pixabay.com/photo/2014/09/07/21/50/library-438389__340.jpg'
  ))?> 

  <div class="container container--narrow page-section">
    <!-- METABOX -->
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program');?>">
        <i class="fa fa-home" aria-hidden="true"></i> All Programs</a> 
        <span class="metabox__main"><?php the_title();?></span>
      </p>
    </div>

    <div class="generic-content"><?php the_field('main_body_content');?></div>

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

    <?php //wp_reset_postdata();?>

    <?php if($homePageEvents->have_posts()):?>
      <hr class="section-break"/>
      <h2 class="headline headline--medium">Upcoming <?php echo get_the_title();?> Events</h2>

      <?php while($homePageEvents -> have_posts()):?>
        <?php $homePageEvents -> the_post();?>
        <?php get_template_part('template-parts/content', 'event')?> <!-- the same as content-event.php  -->
      <?php endwhile;?>
    <?php endif;?>

    <?php wp_reset_postdata();?>

    <?php $relatedCampuses = get_field('related_campus')?>
      <?php if($relatedCampuses):?>
        <hr class="section-break"/>
        <h2 class="headline headline--medium"><?php echo get_the_title();?> is Available at these Campuses</h2>

        <ul class="min-list link-list">
          <?php foreach($relatedCampuses as $campus): ?>
            <li><a href="<?php echo get_the_permalink($campus);?>"><?php echo get_the_title($campus) ?></a></li>
          <?php endforeach; ?>
        </ul>
        
      <?php endif;?>
  
  </div>


<?php endwhile;?>

<?php get_footer();?>