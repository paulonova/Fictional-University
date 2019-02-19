
<div class="post-item">
  <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

  <div class="metabox">
    <p>Posted by <?php the_author_posts_link();?> on <?php the_time('y/n/j');?> in <?php echo get_the_category_list(', ');?></p>
  </div>
  <div class="generic-content">
    <p><?php if(has_excerpt()):?>
          <?php echo get_the_excerpt();?>
        <?php else:?>
          <?php echo wp_trim_words( get_the_content(), 18);?>
        <?php endif;?>
      <p><a class="btn btn--blue" href="<?php the_permalink();?>">Continue Reading &raquo;</a></p>
    </p>
  </div>
</div>