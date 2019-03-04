
<!DOCTYPE html>
<html lang="en">

<head>

    <?php 



        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

        $FirstName=$_POST['FirstName'];
        $LastName=$_POST['LastName'];

        if(empty($FirstName) && empty($LastName)){
            header('Location: https://project.hazimio.com/saseroba'); 
        }

        $hostname = "172.17.0.1";
        $username = "pub";
        $password = "Pub123";
        $db = "saseroba_main";

        $dbconnect=mysqli_connect($hostname,$username,$password,$db);

        $query = "SELECT * FROM Details WHERE FirstName='$FirstName' AND LastName='$LastName'";
        $res = mysqli_query($dbconnect, $query);
        $mydata = $res->fetch_assoc();

        //$randVal = rand(1,6);
        $randCss = "assets/css/orbit-" . $mydata["Colour"] . ".css";
    ?>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SASEROBA - Curriculum Vitae Repository (<?php echo $mydata["DisplayName"]; ?>)</title>

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



    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="shortcut icon" href="favicon.ico">  
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <style type="text/css">
        img {
    max-width: 100%;
    max-height: 100%;
}

.square {
    height: 180px;
    width: 240px;
}
    </style>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo $randCss; ?>" >

    <!--  <link id="theme-style" rel="stylesheet" href="assets/css/orbit-1.css">  -->  

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
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://project.hazimio.com/saseroba/cv/explore">EXPLORE CVs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <h1 class="text-uppercase mb-0"><?php echo $mydata["DisplayName"]; ?> CV</h1>
      <hr class="star-light">
    </div>
  </header>


    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <div class="square">
                <img class="profile" src=<?php echo "\"submit/uploads/user_".$mydata["UserID"].".".$mydata["ImgType"]."\""; ?> alt="" />
                </div>
                <h1 class="name"> <?php echo $mydata["DisplayName"]; ?>  </h1>
                <h3 class="tagline"><?php echo $mydata["CurrentJob"]; ?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                   <li class="email"><i class="fas fa-user"></i><?php echo $mydata["FirstName"] . ' ' . $mydata["LastName"]; ?></li>
                   <li class="email"><i class="fas fa-graduation-cap"></i>SASEROBA Batch <?php echo $mydata["Batch"]; ?> (SPM <?php echo $mydata["Batch"]+2002; ?>)</li>
                   <li class="email"><i class="fas fa-map-marker"></i><?php echo $mydata["Location"]; ?></li>
                    <li class="email"><i class="fas fa-envelope"></i><a href="mailto: yourname@email.com"><?php echo $mydata["Email"]; ?></a></li>
                    <li class="phone"><i class="fas fa-phone"></i><?php echo $mydata["Phone"]; ?></li>
                    <li class="website"><i class="fas fa-globe"></i><a href="<?php echo $mydata["Web"]; ?>" target="_blank"><?php echo $mydata["Web"]; ?></a></li>
                    <li class="linkedin"><i class="fab fa-linkedin-in"></i><a href="https://www.linkedin.com/in/<?php echo $mydata["LinkedIn"]; ?>" target="_blank"><?php echo $mydata["LinkedIn"]; ?></a></li>
                    <li class="twitter"><i class="fab fa-twitter"></i><a href="https://twitter.com/<?php echo $mydata["Twitter"]; ?>" target="_blank">@<?php echo $mydata["Twitter"]; ?></a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title"><b>Education</b></h2>

                <?php 

                    $c = 1;

                    while($c < 4){
                        
                        $var1 = "Cert".$c;
                        if(!empty($mydata["$var1"])){ 

                        $var2 = "Inst".$c;
                        $var3 = "CertYear".$c;

                 ?>     
                
                <div class="item">
                    <h4 class="degree"><?php echo $mydata["$var1"];?></h4>
                    <h5 class="meta"><b><?php echo $mydata["$var2"];?></b></h5>
                    <div class="time"><?php echo $mydata["$var3"];?></div>
                </div><!--//item-->

                <?php 
                        }

                        $c++;
                    }

                    unset($var1,$var2,$var3,$c);
                 ?>

            </div><!--//education-container-->
            

            <div class="interests-container container-block">
                <h2 class="container-block-title"><b>Expertise/Tags</b></h2>
                <ul class="list-unstyled interests-list">
                    <?php 

                    $exp = explode(',', $mydata["Tags_view"]);
                    foreach ($exp as $value) {
                        echo "<li>".ucwords($value)."</li>";
                    }

                    ?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title"><b>Interests</b></h2>
                <ul class="list-unstyled interests-list">
                    <?php 

                    $exp = explode(',', $mydata["Interests_view"]);
                    foreach ($exp as $value) {
                        echo "<li>".ucwords($value)."</li>";
                    }

                    ?>
                    
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-user"></i></span>Career Profile</h2>
                <div class="summary">
                    <p><?php echo $mydata["AboutMe"];?></p>
                </div><!--//summary-->

            
            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-briefcase"></i></span>Experiences (Top 3)</h2>
                
                <?php

                    $c = 1;

                    while($c < 4){
                        
                        $var1 = "Pos".$c;
                        if(!empty($mydata["$var1"])){ 

                        $var2 = "Org".$c;
                        $var3 = "Desc".$c;
                        $var4 = "Year".$c;

                ?>

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><b><?php echo $mydata["$var1"];?></b></h3>
                            <div class="time"><b><?php echo $mydata["$var4"];?></b></div>
                        </div><!--//upper-row-->
                        <div class="company"><b><?php echo $mydata["$var2"];?></b></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php 

                        $text = mysqli_real_escape_string($dbconnect,$mydata["$var3"]); $text = str_replace('\r\n', '<li>', $text); $text = str_replace('<li><li>', '<li>', $text); $text = str_replace(array('<li>- ','<li> -','\r\n-'), '<li>', $text); $text = preg_replace(array('/^\s?-\s?/'),'<li>', $text,1);

                        if(preg_match($reg_exUrl, $text, $url)) {

                            // make the urls hyper links
                            echo preg_replace($reg_exUrl, "<a href=\"{$url[0]}\">{$url[0]}</a>", $text);

                        }else{

                         echo $text;
                        }



                        ?>
                    </div><!--//details-->
                </div><!--//item-->
                
                <?php 
                        }

                        $c++;
                    }

                    unset($var1,$var2,$var3,$var4,$text,$c);
                 ?>
                
            
            <section class="section projects-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-archive"></i></span>Projects (Top 3)</h2>
                <div class="intro">
                    <p></p>
                </div><!--//intro-->

                <?php

                    $c = 1;

                    while($c < 4){
                        
                        $var1 = "Project".$c;
                        if(!empty($mydata["$var1"])){ 

                        $var2 = "DescProj".$c;

                ?>
                <div class="item">
                    <span class="project-title"><b><?php echo $mydata["$var1"];?></b></span><p> <p> 
                        <span class="project-tagline"><?php 

                        $text = mysqli_real_escape_string($dbconnect,$mydata["$var2"]); $text = str_replace('\r\n', '<li>', $text); $text = str_replace('<li><li>', '<li>', $text); $text = str_replace(array('<li>- ','<li> -','\r\n-'), '<li>', $text);  $text = preg_replace(array('/^\s?-\s?/'),'<li>', $text,1);


                        if(preg_match($reg_exUrl, $text, $url)) {

                               // make the urls hyper links
                            echo preg_replace($reg_exUrl, "<a href=\"{$url[0]}\">{$url[0]}</a>", $text);

                        }else{ 
                        
                         echo $text;
                        }

                        ?></span>
                    
                </div><!--//item-->

                <?php 
                        }

                        $c++;
                    }

                    unset($var1,$var2,$text,$c);
                 ?>
            
            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-rocket"></i></span>Skills &amp; Proficiency (Top 5)</h2>
                <div class="skillset">       

                <?php

                    $c = 1;

                    while($c < 6){
                        
                        $var1 = "Skills".$c;
                        if(!empty($mydata["$var1"])){ 

                        $var2 = "SkillProf".$c;
                        $calc = $mydata["$var2"]/10*100;

                ?>

                    <div class="item">
                        <h3 class="level-title"><?php echo $mydata["$var1"];?></h3>
                        <div class="progress level-bar">
                            <div class="progress-bar theme-progress-bar" role="progressbar" style=<?php echo "\"width: ".$calc."%\"";?>aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>                               
                    </div><!--//item-->
                

                <?php 
                        }

                        $c++;
                    }

                    unset($var1,$var2,$text,$c);
                 ?>


                </div>  
            
        </div><!--//main-body-->
    </div>


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
