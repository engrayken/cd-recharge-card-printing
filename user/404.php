<?php
require_once("../app/config.php");
$title="404";
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Content area -->
      <div class="content d-flex justify-content-center align-items-center">

        <!-- Container -->
        <div class="flex-fill">

          <!-- Error title -->
          <div class="text-center mb-3">
            <h1 class="error-title text-black">404</h1>
            <h5>Oops, an error has occurred. Page not found!</h5>
          </div>
          <!-- /error title -->


          <!-- Error content -->
          <div class="row">
            <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">

              <!-- Search -->
              <!-- /search -->


              <!-- Buttons -->
              <!-- /buttons -->

            </div>
          </div>
          <!-- /error wrapper -->

        </div>
        <!-- /container -->

      </div>
      <!-- /content area -->


 <?php require_once('include/user_footer.php');?>
