<!-- Single is used to a individual events -->


<?php get_header();?>

<?php while(have_posts()): ?>
<?php the_post(); ?>

  <!-- Function is in functions.php -->
  <?php pageBanner(array(
    'title' => get_the_title()
  ))?> 

  <div class="container container--narrow page-section">
    
    <!-- The thumbnails  -->
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">          
          <?php the_post_thumbnail('professorPortrait');?>
        </div>
        <div class="two-thirds">
        <?php  
              //LIKE functions
              $likeCount = new WP_Query(array( //Database comunication
                'post_type' => 'like',
                'meta_query' => array(
                  array(
                    'key' => 'liked_professor_id',
                    'compare' => '=',
                    'value' => get_the_ID()
                  )
                )
              ));
              
              $existStatus = 'no'; //default value
              if(is_user_logged_in()){

                $existQuery = new WP_Query(array(
                  'author' => get_current_user_id(),
                  'post_type' => 'like',
                  'meta_query' => array(
                    array(
                      'key' => 'liked_professor_id',
                      'compare' => '=',
                      'value' => get_the_ID()
                    )
                  )
                ));
  
                if($existQuery->found_posts){
                  $existStatus = 'yes';
                }
              }
                       
            ?>
          <span class="like-box" data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-professor="<?php the_ID();?>" data-exists="<?php echo $existStatus;?>">            
            <i class="fa fa-heart-o" aria-hidden="true"></i>
            <i class="fa fa-heart" aria-hidden="true"></i>
            <span class="like-count"><?php echo $likeCount->found_posts;?></span>
          </span>
          <?php the_content();?>       
        </div>
      </div>
    </div>


     <!-- This block code cares about RELATIONSHIP between Professors and Programs / not working  
      because of a bug in the pluggin ACF -->
    <?php $relatedPrograms = get_field('related_programs'); ?>
      <?php if($relatedPrograms): ?>
          <hr class="section-break">
          <h2 class="headline headline--medium">Subject(s) Taught</h2>
          <ul class="link-list min-list">  

        <?php foreach($relatedPrograms as $program):?>
          <li><a href="<?php echo get_the_permalink($program);?>"><?php echo get_the_title($program);?></a></li>
        <?php endforeach;?>      
        
      <?php else: ?>
        <hr class="section-break"/>
        <h4 class="headline headline--small">No Programs related to <?php echo get_the_title();?></h4>
        </ul>
      <?php endif; ?>
      
  </div>


<?php endwhile;?>

<?php get_footer();?>