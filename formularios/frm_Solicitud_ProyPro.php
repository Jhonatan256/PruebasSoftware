<?php 
session_start();
if(isset($_SESSION['user']) and isset($_SESSION['rol'])){
  if($_SESSION['rol']==2){
    header("location: instructores/frm_ProyPro_Instructores.php");
  }
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
    <title>Estado | Proyecto Productivo</title>
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
                            <li><a href="frm_index.php">INICIO</a> </li>
                            <li><a ><?PHP echo $_SESSION['nombre']; ?></a> </li>
                            <li><a href="../../index.php?salir=si" name="salir">SALIR</a> </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

        </div>
        </form>
    </section>

    <?php 
$modo=isset($_GET['modo'])? $_GET['modo']: $modo="Validar";
switch ($modo) {

   case 'Registros':   
  ?>
 
        <section class="contact page" id="CONTACT">
        <div class="section_overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 wow bounceIn">
                    <!-- Start Contact Section Title-->
                    <div class="section_title">
                        <h2>REGISTRO PROYECTOS PRODUCTIVOS</h2>
                        <p>A continuación usted podra generar una solicitud que será revisada por un Instructor que aprobará o rechazará su solicitud.</p>
                    </div>
                </div>
            </div>

            <div class="contact_form wow bounceIn">
                <div class="container">

                <!-- START ERROR AND SUCCESS MESSAGE -->
                <!-- END ERROR AND SUCCESS MESSAGE -->

                <!-- CONTACT FORM starts here, Go to contact.php and add your email ID, thats it.-->    
                    <form action="../ProyectosProductivos.php?modo=Registro" method="post" enctype="multipart/form-data" >  
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text"  name="txt_tema" class="form-control" id="name" placeholder="Proyecto">
                                <input type="text" name="txt_nombre" class="form-control" id="email" placeholder="Nombre">
                                <input type="file" name="img_carta" class="form-control" id="subject" placeholder="Carta">
                            </div>


                            <div class="col-md-8">
                                <button type="submit"  name="registro"  class="form-control btn btn-primary submit-btn" >REGISTRAR</button>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM --> 
                </div>
            </div>
        </div>
      </section>
<?php
   break;


 case 'Estado':
   
    ?>
<form action="../controlado_aprendiz/control_aprendiz.php?modo=inicio" method="post">
 <section class="about page" id="Solicitud">       
        <div class="video_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeftBig">
                    <!-- VIDEO LEFT TITLE -->
                        <div class="video_title">
                           <table class="table">
                             <?php if ((isset($_SESSION['consultaV'])) and (!empty($_SESSION['consultaV'])) ){
                              $res_estado=$_SESSION['consultaV'];?>
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Tema Proyecto</th>
                                  <th scope="col">Nombre Proyecto</th>
                                  <th scope="col">Carta Aprobado</th>
                                  <th scope="col">Estado</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($res_estado as $clave => $valor){
                                  $_SESSION['Codigo_Proyecto']= 2; ?>
                                  <tr>
                                    <td><?php  echo $res_estado[$clave]['Codigo_Proyecto'] ?> </td>
                                    <td><?php  echo $res_estado[$clave]['Tema_Proyecto'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['nombre_Proyecto'] ?></td>
                                    <td><a href=frm_Solicitud_ProyPro.php?modo=Estado&ismg=<?php  echo $res_estado[$clave]['Carta_Aprobado'] ?>>ver</a></td>
                                    <td><?php  echo $res_estado[$clave]['Estado'] ?></td>
                                    <?php if($res_estado[$clave]['Estado']=="Pendientes"){

                                    } elseif($res_estado[$clave]['Estado']=="Finalizado"){
                                        ?>
                                        <td> <button type="submit" name="certificado" class="form-control btn btn-primary" >CERTIFICADO</button></td><br>
                                   <?php   }else{  ?>
                                   <td> <button type="submit" name="gestionar" value="" class="form-control btn btn-primary" >GESTIONAR</button></td><br>
                                  </tr>
                                      <?php
                                  }
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
                            <a type="submit" href="frm_index.php" class="btn home-btn wow fadeInLeft" >Volver</a>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig">
                         <!-- VIDEO -->                   
                        <div class="video">

                        <?php if(isset($_REQUEST['ismg']) and $_REQUEST['ismg']<>"Sin registrar"){
                            ?>
                            <img src="../Imagenes/<?php  echo $_REQUEST['ismg']; ?>" alt="">
                            <?php
                          }else{
                            ?>
                            <h1>Visualice aquí la carta de aprobación</h1><?php
                            } ?>
                        
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
  </form>
    <?php   
  break;

   case 'Validar':

   if(isset($_SESSION['user']) ){
    header("location: ../ProyectosProductivos.php?modo=Validar");    
  }else{ ?>

<section class="subscribe parallax subscribe-parallax" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="section_overlay wow lightSpeedIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <!-- Start Subscribe Section Title -->
                        <div class="section_title">
                            <h2>VALIDAR SOLICITUD DE PROYECTO</h2>
                            <p>Consulte si tiene una solicitud de registro pendiente</p>
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
                           <form action="../ProyectosProductivos.php?modo=Validar" method="post" enctype="multipart/form-data" >                           
                        <input type="hidden" name="u" value="6908378c60c82103f3d7e8f1c">
                        <input type="hidden" name="id" value="8c5074025d">
                            <div class="form-group">
                                <!-- EMAIL INPUT BOX -->
                                <input type="text" autocapitalize="off" autocorrect="off" name="txt_Validar" class=" form-control" id="mce-EMAIL" placeholder="Identificacion" >       
                                 

                            </div>
                                <!-- SUBSCRIBE BUTTON -->
                          <button type="submit" name="Validar" class="btn home-btn wow fadeInLeft" >VALIDAR</button><br><br>
                        </form>
                          <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php }

    break;

  }
  
   ?>

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







