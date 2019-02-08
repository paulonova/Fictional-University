<!--  -->

<?php

  get_header();

  while(have_posts()) {
    the_post(); ?>
    
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>DONT FORGET TO REPLACE ME LATER</p>
        </div>
      </div>  
    </div>

    <div class="container container--narrow page-section">
    
    <!-- show the ID of the parent of this page get_the_ID() 
    IF ZERO (false) means don´t have parent else this page has a parent -->
    <?php
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?>
        </a> <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
      <?php }
    ?>

    
    
    <?php 
    /**Return ZERO if page has no child (is a parent)*/
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if ($theParent or $testArray) { ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
      <ul class="min-list">
      <!--  Define if the page is a Parent or a Child..-->
        <?php
          if ($theParent) {
            $findChildrenOf = $theParent; //Parent page ID
          } else {
            $findChildrenOf = get_the_ID(); // Current page ID
          }

          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $findChildrenOf,
            'sort_column' => 'menu_order'  /** follow the order nummer from wordpress edit page */
          ));
        ?>
      </ul>
    </div>
    <?php } ?>
    

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>
    
  <?php }

  get_footer();

?>