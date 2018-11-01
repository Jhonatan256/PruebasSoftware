
<?php
session_start();
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

 <?php
     if( isset($_SESSION['rol'] ) and $_SESSION['rol']==2)  { 
     $_SESSION['rol1']=$_SESSION['rol'];  ?>
    <section class="header parallax home-parallax page" id="HOME">
        <form action="../index.php" method="post">
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
                        <a class="navbar-brand" href="#">
                            <img src="images/logo.png" alt="Logo">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

            <div class="container home-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                                <!-- LOGO -->
                            <img width="125" height="55" src="images/logo.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="home_text">
                            <!-- TITLE AND DESC -->
                            <h1>Proyectos productivos CDM</h1>
                            <h1>Bienvenido</h1>
                            <p>Instructor de emprendimiento.</p>
                            <p><?php echo $_SESSION['Nombre_Usuario']; ?></p>

                            <div class="download-btn">                            <!-- BUTTON -->
                            <?php                             
                            if(isset($_SESSION['user']) ){ 
                                ?>
                                <button type="submit" name="Salir" class="btn home-btn wow fadeInLeft" >SALIR</button>
                                <?php 
                            }else{  
                            ?>
                                 <button type="submit" name="Login" class="btn home-btn wow fadeInLeft" >INGRESAR</button>
                                <?php } ?>
                                    
                                <a class="btn home-btn wow fadeInLeft" href="Instructores/frm_solicitudes_proyPro_Ins.php">PROYECTOS PRODUCTIVOS</a>
                                     
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-4">
                        <div class="home-iphone">
                            <img src="images/iPhone_Home.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
<?php }elseif(isset($_SESSION['rol']) and  $_SESSION['rol']=1 ){   ?>
<section class="header parallax home-parallax page" id="HOME">
        <form action="../index.php" method="post">
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
                        <a class="navbar-brand" href="#">
                            <img src="images/logo.png" alt="Logo">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

            <div class="container home-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                                <!-- LOGO -->
                            <img width="125" height="55" src="images/logo.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="home_text">
                            <!-- TITLE AND DESC -->
                            <h1>Proyectos productivos CDM</h1>
                            <h1>Bienvenido</h1>
                            <p>Aprendiz:</p>
                            <p><?php echo $_SESSION['Nombre_Usuario']; ?></p>

                            <div class="download-btn">
                            <!-- BUTTON -->
                            <?php                             
                            if(isset($_SESSION['user']) ){ 
                                ?>
                                <button type="submit" name="Salir" class="btn home-btn wow fadeInLeft" >SALIR</button>
                                <?php 
                            }else{ 
                            ?>
                                 <button type="submit" name="Login" class="btn home-btn wow fadeInLeft" >INGRESAR</button>
                                <?php } ?>

                                
                            <a class="btn home-btn wow fadeInLeft" href="../ProyectosProductivos.php?modo=Validar">PROYECTOS PRODUCTIVOS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-4">
                        <div class="home-iphone">
                            <img src="images/iPhone_Home.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
  <?php }else{
    header("location: frm_login.php");
    } ?>

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

