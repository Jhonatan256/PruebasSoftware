<?php 
session_start();

  if(isset($_REQUEST['modo']) AND !empty($_REQUEST['modo'])){
    $_REQUEST['cod']="";
    $_SESSION['Codigo_Proyecto']="";
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
    <title>CDM | PROYECTOS PRODUCTIVOS SENA</title>
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,300' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="../../css/owl.carousel.css" rel="stylesheet">
    <link href="../../css/owl.theme.css" rel="stylesheet">


    <!-- Pixeden Icon Font -->
    <link rel="stylesheet" href="../../css/Pe-icon-7-stroke.css">

    <!-- Font Awesome -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet">


    <!-- PrettyPhoto -->
    <link href="../../css/prettyPhoto.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Style -->
    <link href="../../css/style.css" rel="stylesheet">

    <link href="../../css/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="../../css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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

    <section class="header parallax home-parallax page" id="HOME">
     <form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=inicio" method="post" >
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
                            <li><a href="../frm_index.php">INICIO</a> </li>
                            <li><a ><?PHP echo $_SESSION['Nombre_Usuario']; ?></a> </li>
                            <li><a href="../../index.php?salir=si" name="salir">SALIR</a> </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-left">
                            <!-- NAV -->
                            <li><a href="#HOME" name="salir">INICIO</a> </li>
                            <li><a href="#Solicitud">SOLICITUDES</a> </li>
                            <li><a href="#Registrados">REGISTRADOS</a> </li>
                        </ul>
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
                            <p><?php echo $_SESSION['user']; ?></p>

                            <div class="download-btn">
                            <!-- BUTTON -->
                                <a  class="btn home-btn wow fadeInLeft" href="#Solicitud">Ver Solicitud de proyectos</a>
                               <a   class="btn home-btn wow fadeInLeft" href="#Registrados">Ver proyectos registrados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
<form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=inicio" method="post" >
    <section class="about page" id="Solicitud">       
        <div class="video_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeftBig">
                    <!-- VIDEO LEFT TITLE -->
                        <div class="video_title">
                            <table class="table">
                             <?php if ((isset($_SESSION['consultaP'])) and (!empty($_SESSION['consultaP'])) ){
                              $res_estado=$_SESSION['consultaP'];?>
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Tema Proyecto</th>
                                  <th scope="col">Nombre Proyecto</th>
                                  <th scope="col">Carta Aprobado</th>
                                  <th scope="col">Id usuario</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($res_estado as $clave => $valor){
                                  $_SESSION['id_cod_proP']=$res_estado[$clave]['Codigo_Proyecto'];?>
                                  <tr>
                                    <td><?php  echo $res_estado[$clave]['Codigo_Proyecto'] ?> </td>
                                    <td><?php  echo $res_estado[$clave]['Tema_Proyecto'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['nombre_Proyecto'] ?></td>
                                    <td><a href=frm_solicitudes_proyPro_Ins.php?img=<?php  echo $res_estado[$clave]['Carta_Aprobado'] ?>>ver</a></td>
                                    <td><?php  echo $res_estado[$clave]['FK_Id_Usuario'] ?></td>
                                   <td> <button type="submit" name="aprobar" class="form-control btn btn-primary" >Aprobar</button></td><br>
                                  </tr>
                                      <?php
                                    }
                                  }else {
                                    echo "no hay solicitudes";
                                  }
                                ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="video-button">
                            <!-- BUTTON -->
                            <button type="submit" name="solicitudes" class="btn home-btn wow fadeInLeft" >Recargar</button>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig">
                         <!-- VIDEO -->                   
                        <div class="video">

                        <?php if(isset($_REQUEST['img']) and $_REQUEST['img']<>"Sin registrar"){
                            ?>
                            <img src="../../imagenes/<?php  echo $_REQUEST['img']; ?>" alt="">
                            <?php
                          }else{
                            ?>
                            <h1>En esta parte podra encontrar las solicitudes de los aprendices del CDM para registrar e iniciar un proceso de proyecto productivo.</h1><?php
                            } ?>
                        
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->
    <section class="about page" id="Registrados">       

        <div class="video_area2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeftBig">
                    <!-- VIDEO LEFT TITLE -->
                        <div class="video_title">
                            <h1>En esta sección encontrar los proyectos productivos que ya se encuentran registrados y pueden empezar su formación productiva.</h1>
                        </div>                        
                    </div>
                    <div class="col-md-6 wow fadeInRightBig">
                         <!-- VIDEO -->
                        <div class="video">
                        <?php
                          if ((isset($_SESSION['consultaC'])) and (!empty($_SESSION['consultaC'])) ){
                            $res_estado=$_SESSION['consultaC'];?>
                        <table class="table">
                              <thead>
                                <tr>
                                <th scope="col">Codigo Proyecto</th>
                                <th scope="col">Tema Proyecto</th>
                                <th scope="col">Nombre Proyecto</th>
                                <th scope="col">Estado Solicitud</th>
                                <th scope="col">Id usuario</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                foreach ($res_estado as $clave => $valor) {
                                  $_SESSION['id_cod_proC']=$res_estado[$clave]['Codigo_Proyecto'];
                                  ?>
                                    <tr>
                                     <td><?php  echo $res_estado[$clave]['Codigo_Proyecto'] ?> </td>
                                      <td><?php  echo $res_estado[$clave]['Tema_Proyecto'] ?></td>
                                      <td><?php  echo $res_estado[$clave]['nombre_Proyecto'] ?></td>
                                      <td><?php  echo $res_estado[$clave]['Estado'] ?></td>
                                      <td><?php  echo $res_estado[$clave]['FK_Id_Usuario'] ?></td>
                                      <td><a href="frm_gestion_Soli_PP.php?modo=inicio&cod=<?php echo $res_estado[$clave]['Codigo_Proyecto']; ?>&nombre=<?php echo $res_estado[$clave]['nombre_Proyecto']; ?>&tema=<?php echo $res_estado[$clave]['Tema_Proyecto']; ?>" class="badge badge-light link" style="margin-left: 35px;">Gestionar</a></td><br>
                                    </tr>
                                  <?php
                                 }?>                         
                              </tbody>
                            </table>
                             <?php                          
                          }else {
                            echo "No hay proyectos inscritos"; 
                          }
                          ?>
                        </div>
                    </div>
                    <div class="video-button">
                    <button  type="submit" name="gestionar" class="btn home-btn wow fadeInLeft">Recargar</button>                          
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.js"></script>
    <script src="../../js/jquery.fitvids.js"></script>
    <script src="../../js/smoothscroll.js"></script>
    <script src="../../js/jquery.parallax-1.1.3.js"></script>
    <script src="../../js/jquery.prettyPhoto.js"></script>
    <script src="../../js/jquery.ajaxchimp.min.js"></script>
    <script src="../../js/jquery.ajaxchimp.langs.js"></script>
    <script src="../../js/wow.min.js"></script>
    <script src="../../js/waypoints.min.js"></script>
    <script src="../../js/jquery.counterup.min.js"></script>
    <script src="../../js/script.js"></script>


</body>
</html>






