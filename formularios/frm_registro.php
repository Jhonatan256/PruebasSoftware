
<?php 
session_start();
if(isset($_SESSION['user'])){
  header('location: frm_index.php');
}
 ?>


<!DOCTYPE html>
<html lang="en">
<!--
  Bent - Bootstrap Landing Page Template by Dcrazed
  Site: https://dcrazed.com/bent-app-landing-page-template/
  Free for personal and commercial use under GNU GPL 3.0 license.
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bent | App Landing Page</title>
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,300' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">


    <!-- Pixeden Icon Font -->
    <link rel="../stylesheet" href="css/Pe-icon-7-stroke.css">

    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">


    <!-- PrettyPhoto -->
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="../shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Style -->
    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.../js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <!-- PRELOADER -->
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

 <!-- END PRELOADER -->

 <!-- =========================
     START ABOUT US SECTION
============================== -->

    <section class="header parallax home-parallax page" id="HOME">
        <h2></h2>
        <div class="section_overlay">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- NAV -->
                            <li><a href="frm_login.php">LOGIN</a> </li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

        </div>
    </section>
<section class="subscribe parallax subscribe-parallax" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="section_overlay wow lightSpeedIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <!-- Start Subscribe Section Title -->
                        <div class="section_title">
                            <h2>REGISTRO DE USUARIOS</h2>
                        </div>
                        <!-- End Subscribe Section Title -->
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row  wow lightSpeedIn">
                    <div class="col-md-6 col-md-offset-3">
                        <!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
                        <div class="subscription-success"></div>
                        <div class="subscription-error"></div>
                        <!-- Check this topic on how to add email subscription list, http://kb.mailchimp.com/lists/signup-forms/host-your-own-signup-forms -->
                         <form id="mc-form" action="../login.php?modo=registro" method="post" class="subscribe_form">                          
                        <input type="hidden" name="u" value="6908378c60c82103f3d7e8f1c">
                        <input type="hidden" name="id" value="8c5074025d">
                            <div class="form-group">
                                <!-- EMAIL INPUT BOX -->
                                <input type="text" autocapitalize="off" autocorrect="off" name="id" class=" form-control" id="mce-EMAIL" placeholder="Identificación" >        
                                 <input type="text" autocapitalize="off" autocorrect="off" name="nombre" class="form-control" id="mce-EMAIL" placeholder="Nombre"  > 
                                 <input type="text" autocapitalize="off" autocorrect="off" name="apellido" class=" form-control" id="mce-EMAIL" placeholder="Apellidos" >        
                                 <input type="text" autocapitalize="off" autocorrect="off" name="titulacion" class="form-control" id="mce-EMAIL" placeholder="Titulación"  >  
                                 <input type="email" autocapitalize="off" autocorrect="off" name="email" class=" form-control" id="mce-EMAIL" placeholder="Email" >        
                                 <input type="password" autocapitalize="off" autocorrect="off" name="pass" class="form-control" id="mce-EMAIL" placeholder="Contraseña"  >  
                                 <input type="text" autocapitalize="off" autocorrect="off" name="rol" class=" form-control" id="mce-EMAIL" placeholder="Rol" >                             
                            </div>
                                <!-- SUBSCRIBE BUTTON -->
                          <button type="submit" name="ingreso" class="btn home-btn wow fadeInLeft" >Ingresar</button><br><br>

                        </form>
                          <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END FOOTER -->


<!-- =========================
     SCRIPTS 
============================== -->


    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.js"></script>
    <script src="../js/jquery.fitvids.js"></script>
    <script src="../js/smoothscroll.js"></script>
    <script src="../js/jquery.parallax-1.1.3.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.ajaxchimp.langs.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/script.js"></script>




</body>
</html>
