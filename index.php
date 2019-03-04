<?php

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');


use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

    $handler = new Handler();
    $handler->getJavascriptAntiBot();


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SASEROBA - Curriculum Vitae Repository</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Live Search Styles -->
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/ajaxlivesearch.min.css">

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">SASEROBA CV</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#cvsearch">SEARCH</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://project.hazimio.com/saseroba/cv/submit">SUBMIT CV DETAILS</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://project.hazimio.com/saseroba/cv/explore">EXPLORE CVs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <img class="img-fluid mb-5 d-block mx-auto" src="img/logo.png" alt="">
      <h1 class="text-uppercase mb-0">SASEROBA Curriculum Vitae Repository</h1>
      <hr class="star-light">
      <h2 class="font-weight-light mb-0">You know, the usual stuffz</h2>
    </div>
  </header>


  <!-- Contact Section -->
  <section id="cvsearch">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Live Search</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form action="cv/index.php" method="post" class="search">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label></label>
                <input name="ls_query" type="text" class='mySearch' id="ls_query" placeholder="Type ['Name' or 'Tags' or 'Interest'] to start searching ..." value="" maxlength="100">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
                <input type=hidden name="FirstName" value="" />
                <input type=hidden name="LastName" value="" />
            <div id="success"></div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Get CV</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">

  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="js/ajaxlivesearch.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>



<script>
jQuery(document).ready(function(){
    jQuery(".mySearch").ajaxlivesearch({
        loaded_at: <?php echo time(); ?>,
        token: <?php echo "'" . $handler->getToken() . "'"; ?>,
        max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
        onResultClick: function(e, data) {
            // get the index 0 (first column) value
            selectedOne = jQuery(data.selected).find('td').eq('0').text();
            selectedTwo = jQuery(data.selected).find('td').eq('1').text();
            comb = selectedOne + ' ' + selectedTwo;

            // set the input value
            jQuery('#ls_query').val(comb);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');

            document.getElementsByName('FirstName')[0].value = selectedOne;
            document.getElementsByName('LastName')[0].value = selectedTwo;

        },
        onResultEnter: function(e, data) {
            // get the index 0 (first column) value
            selectedOne = jQuery(data.selected).find('td').eq('0').text();
            selectedTwo = jQuery(data.selected).find('td').eq('1').text();
            comb = selectedOne + ' ' + selectedTwo;

            // set the input value
            jQuery('#ls_query').val(comb);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');

            document.getElementsByName('FirstName')[0].value = selectedOne;
            document.getElementsByName('LastName')[0].value = selectedTwo;
        },
        onAjaxComplete: function(e, data) {

        }
    });
})
</script>


</body>

</html>
