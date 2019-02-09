<?php get_header();?>

<?php while(have_posts()): ?>
  <?php the_post(); ?>

    <!-- Function is in functions.php -->
    <?php pageBanner(array(
      'title' => 'Hello this is the title',
      'subtitle' => 'Hi this is a subtitle',
      'photo' => 'http://ecarecareers.com.au/wp-content/uploads/2017/02/ecare-aboutus-bkg2.jpg'
    ));?>

  <div class="container container--narrow page-section">

    <!-- show the ID of the parent of this page get_the_ID() 
    IF ZERO (false) means don´t have parent else this page has a parent -->
    <?php $theParent = wp_get_post_parent_id(get_the_ID());?>
    <?php if($theParent):?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent);?>">
          <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent);?>
        </a> <span class="metabox__main"><?php the_title();?></span></p>
      </div>
    <?php endif;?>

    <?php 
      /**Return ZERO if page has no child (is a parent)*/
      $testArray = get_pages(array(
        'child_of' => get_the_ID()
      ));
    ?>
    
    <?php if($theParent || $testArray):?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent)?>"><?php echo get_the_title($theParent);?></a></h2>
        <ul class="min-list">

        <!--  Define if the page is a Parent or a Child..-->
          <?php if($theParent):?>
            <?php $findChildOf = $theParent; ?>  <!-- Parent page ID-->
          <?php else:?>
            <?php $findChildOf = get_the_ID(); ?>  <!-- Current page ID-->
          <?php endif;?>

            <?php wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildOf,
              'sort_column' => 'menu_order' /** follow the order nummer from wordpress edit page */
            ));?>
          
        </ul>
      </div>     
    <?php endif;?>
     

    <div class="generic-content">
      <?php the_content();?>
    </div>

  </div>
<?php endwhile;?>

<?php get_footer();?>