
<!-- If the usser is not inlogad the page will redirect to homepage.. -->
<?php if(!is_user_logged_in()):?>
  <?php wp_redirect(esc_url(site_url('/')));?>
  <?php exit; ?>
<?php endif; ?>


<?php get_header();?>

<?php while(have_posts()): ?>
  <?php the_post(); ?>

    <!-- Function is in functions.php -->
    <?php pageBanner(array(
      'title' => get_the_title(),
      'subtitle' => get_field('page_banner_subtitle')
    ));?>

  <div class="container container--narrow page-section">
    <ul class="min-list link-list" id="my-notes">
      <?php 
         $userNotes = new WP_Query(array(
          'post_type' => 'note',
          'posts_per_page' => -1,
          'author' => get_current_user_id()
        ));
      ?>
        <p>TESTE 1</p>
      <?php while($userNotes->have_posts()):?>
        <?php $userNotes->the_post();?>
        <p>TESTE 2</p>
        <li>
          <input class="note-title-field" value="<?php echo esc_attr(get_the_title()); ?>">
          <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
          <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
          <textarea class="note-body-field"><?php echo esc_attr(get_the_content()); ?></textarea>
        </li>

      <?php endwhile;?>  
    </ul>

  </div>
<?php endwhile;?>

<?php get_footer();?>