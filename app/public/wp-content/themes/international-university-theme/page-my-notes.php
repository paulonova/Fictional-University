
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

    <div class="create-note">
      <h2 class="headline headline--medium">Create New Note</h2>
      <input class="new-note-title" placeholder="Title">
      <textarea class="new-note-body" placeholder="Your note here..."></textarea>
      <span class="submit-note">Create Note</span>
      <span class="note-limit-message">Note Limit reached: Delete an existing note to make room for a new one.</span>
    </div>
  
    <!-- My Notes Body -->
    <ul class="min-list link-list" id="my-notes">
      <?php 
         $userNotes = new WP_Query(array(
          'post_type' => 'note',
          'posts_per_page' => -1,
          'author' => get_current_user_id() // get the post created by the logedin user..
       ));
      ?>

      <?php while($userNotes->have_posts()):?>
        <?php $userNotes->the_post();?>
        <li data-id="<?php the_ID();?>"> <!-- Makes the ID lives in html -->
          <input readonly class="note-title-field" value="<?php echo str_replace("Private: ", "", esc_attr(get_the_title())); ?>">
          <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
          <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
          <textarea readonly class="note-body-field"><?php echo esc_textarea(get_the_content()); ?></textarea>
          <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
        </li>

      <?php endwhile;?>  
    </ul> 

  </div>
<?php endwhile;?>

<?php get_footer();?>




