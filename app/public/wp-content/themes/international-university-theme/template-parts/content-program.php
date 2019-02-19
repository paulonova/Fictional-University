

<div class="post-item">
  <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

  <div class="generic-content">
    <p><?php if(has_excerpt()):?>
          <?php echo get_the_excerpt();?>
        <?php else:?>
          <?php echo wp_trim_words( get_the_content(), 18);?>
        <?php endif;?>
      <p><a class="btn btn--blue" href="<?php the_permalink();?>">View program &raquo;</a></p>
    </p>
  </div>
</div>