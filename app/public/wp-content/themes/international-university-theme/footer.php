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

<footer class="site-footer">

    <div class="site-footer__inner container container--narrow">

      <div class="group">

        <div class="site-footer__col-one">
          <h1 class="school-logo-text school-logo-text--alt-color"><a href="<?php echo site_url() ?>"><strong>International</strong> University</a></h1>
          <p><a class="site-footer__link" href="#">+46 853765</a></p>
        </div>

        <div class="site-footer__col-two-three-group">
          <div class="site-footer__col-two">
            <h3 class="headline headline--small">Explore</h3>
            <nav class="nav-list">

            <!-- DINAMIC FOOTER MENU 1 -->
          <!-- <?php// wp_nav_menu(array(
            //'theme_location' => 'footerLocationOne'  /**Registered in function.php */
          //))?> -->

              <ul>
                <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                <li><a href="#">Programs</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Campuses</a></li>
              </ul>
            </nav>
          </div>

          <div class="site-footer__col-three">
            <h3 class="headline headline--small">Learn</h3>
            <nav class="nav-list">

              <!-- DINAMIC FOOTER MENU 2 -->
          <!-- <?php //wp_nav_menu(array(
           // 'theme_location' => 'footerLocationTwo'  /**Registered in function.php */
          //))?> -->

              <ul>
                <li><a href="#">Legal</a></li>
                <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
                <li><a href="#">Careers</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="site-footer__col-four">
          <h3 class="headline headline--small">Connect With Us</h3>
          <nav>
            <ul class="min-list social-icons-list group">
              <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
  </footer>

  <!-- SEARCH OVERLAY -->
  <div class="search-overlay">
    <div class="search-overlay__top">
      <div class="container">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
        <input type="text" class="search-term" placeholder="What are you seraching for?" id="search-term">
        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
      </div>
    </div>
  </div>



<?php wp_footer(); ?>
</body>
</html>