<?php get_header();?>
    
<div class="page-banner">
  <div class="page-banner__bg-image" 
       style="background-image: url(<?php echo get_theme_file_uri('images/library-hero.jpg')?>);"></div> <!-- echo get_theme_file_uri() get the root path of theme -->
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">Welcome!</h1>
      <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
      <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
      <a href="<?php echo get_post_type_archive_link('program')?> " class="btn btn--large btn--blue">Find Your Major</a>
    </div>
  </div>

  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

        <?php 
          $today = date('Ymd');
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
              )
            )
          ));
        ?>

        <?php while($homePageEvents -> have_posts()):?>
        <?php $homePageEvents -> the_post();?>
          
        <!-- get the template from content-event.php  -->
        <?php get_template_part('template-parts/content', 'event')?>

        <?php endwhile;?>
        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event')?>" class="btn btn--blue">View All Events</a></p>

      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

        <?php 
          $homePagePosts = new WP_Query(array(
            'posts_per_page' => 2,
            'orderby' => 'title',
            'order' => 'ASC', // ascendent
          ));
        ?>
        
        <?php while($homePagePosts -> have_posts()):?>
        <?php $homePagePosts -> the_post();?>
          
          <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink();?>">
              <span class="event-summary__month"><?php the_time('M');?></span>
              <span class="event-summary__day"><?php the_time('d');?></span>  
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
              </h5>
              
              <p><?php if(has_excerpt()):?>
                  <?php echo get_the_excerpt() . '...';?>
                <?php else:?>
                  <?php echo wp_trim_words( get_the_content(), 18, '...' );?>
                <?php endif;?>
                <a href="<?php the_permalink();?>" class="nu gray">Read more</a>
              </p>

            </div>
          </div>
          <?php ?>
        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        <p class="t-center no-margin"><a href="<?php echo site_url('/blog');?>" class="btn btn--yellow">View All Blog Posts</a></p>
      </div>
    </div>
  </div>

  <div class="hero-slider">
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/school-transport.jpg')?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">Free Transportation</h2>
          <p class="t-center">All students have free unlimited bus fare.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/nutritional-food.jpg')?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">Nutritional Food</h2>
          <p class="t-center">Our Nutritionist program recommendations.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/bar-school.jpg')?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">School Bar</h2>
          <p class="t-center">International University offers lunch plans for those in need.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
      </div>
    </div>
</div>
   

<?php get_footer();?>
