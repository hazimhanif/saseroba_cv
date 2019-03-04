
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

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="https://project.hazimio.com/saseroba">SASEROBA CV</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://project.hazimio.com/saseroba">SEARCH</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://project.hazimio.com/saseroba/cv/submit">SUBMIT CV DETAILS</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#explore">EXPLORE CVs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <h1 class="text-uppercase mb-0">CV Exploration</h1>
      <hr class="star-light">
    </div>
  </header>


  <!-- Contact Section -->
  <section id="explore">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">

<table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>First name</th>
                <th>Last name</th>
            </tr>
        </thead>
        <tbody>
          
          <?php
$hostname = "172.17.0.1";
$username = "pub";
$password = "Pub123";
$db = "saseroba_main";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);
$query = "SELECT FirstName,LastName FROM Details ORDER BY FirstName";
$results = mysqli_query($dbconnect, $query);
$count=1;

while($row=mysqli_fetch_array($results)){
  echo "<tr>
        <td>$count</td>
        <td>".$row['FirstName']."</td>
        <td>".$row['LastName']."</td>
        </tr>
  ";
  $count++;
}



          ?>

     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

       <script type="text/javascript">
    
$(document).ready( function () {
    $('#myTable').DataTable();
} );

  </script>

        </tbody>
    </table>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">

  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Hazim Hanif 2019</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>v

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>





</body>

</html>
