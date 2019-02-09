<!-- Single is used to a individual events -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <?php pageBanner(array(
    // 'title' => get_the_title()
    // 'photo' => 'https://cdn.pixabay.com/photo/2019/02/07/15/43/agenda-3981504_960_720.jpg'
  ))?> 

  <div class="container container--narrow page-section">
    <!-- METABOX -->
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event');?>">
        <i class="fa fa-home" aria-hidden="true"></i> Events Home </a> 
        <span class="metabox__main"><?php the_title();?></span>
      </p>
    </div>

    <div class="generic-content"><?php the_content();?></div>


     <!-- This block code cares about RELATIONSHIP between Events and Programs / not working  
      because of a bug in the pluggin ACF -->
    <?php $relatedPrograms = get_field('related_programs'); ?>
      <?php if($relatedPrograms): ?>
        <hr class="section-break">
        <h2 class="headline headline--medium">Related Programs</h2>
        <ul class="link-list min-list">      
        <?php foreach($relatedPrograms as $program):?>
          <li><a href="<?php echo get_the_permalink($program);?>"><?php echo get_the_title($program);?></a></li>
        <?php endforeach;?>      
        </ul>
      <?php else: ?>
        <hr class="section-break">
        <ul class="link-list min-list">
          <li>No related progam at this moment..</li>
          <p><a href="<?php echo get_post_type_archive_link('program')?>">Take a look in our programs here >>></a></p>
        </ul>
      <?php endif; ?>
      
  </div>


<?php endwhile;?>

<?php get_footer();?>