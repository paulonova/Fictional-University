<!-- 
/** THIS PAGE -- WARNING!! 
     * This page is to demonstrate how to create a DINAMIC MENU created in wordpress Editor
     * Steps:
     * 1- Open the functions.php
     * 2- Create in university_features function the - register_nav_menu('name', 'Menu names')
     * 3- Open Menus and create a Menu Name
     * 4- Select witch Most Recent I want
     * 5- select Display Locaation []
     * 
    */
 -->


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Page Title</title>  Page Title is set in functions.php-->
    <?php wp_head(); ?> <!--WordPress take care of all css and javascripts links places in functions.php  -->
  </head>

  <body <?php body_class(); ?>> <!-- show different classes dependent on witch page I am -->
    <header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>International</strong> University</a></h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">

        <!-- DINAMIC MENU -->
          <!-- <?php //wp_nav_menu(array(
            //'theme_location' => 'headerMenuLocation'  /**Registered in function.php */
          //))?> -->

          <ul>
            <!-- Turn link selected when I´m in the parent and in the child page -->
            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 37) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>
