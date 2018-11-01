
<?php 

  session_start();
  if(!isset( $_SESSION['Nombre_Usuario'])){
     header("location: ../frm_login.php");
  }
if($_REQUEST['modo']=='inicio'){
 header("location: ../../controlado_aprendiz/control_aprendiz.php?modo=inicio");
}elseif ($_REQUEST['modo']=='proyecto') {

//echo $_SESSION['consultaEvdidenciasPendientes'][1][0];
}
?>
<!DOCTYPE htm<html lang="en">
<!--
  Bent - Bootstrap Landing Page Template by Dcrazed
  Site: https://dcrazed.com/bent-app-landing-page-template/
  Free for personal and commercial use under GNU GPL 3.0 license.
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aprendiz | Proyectos Productivos</title>
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
                            <li><a href="../frm_index.php">INICIO</a> </li>
                            <li><a ><?PHP echo $_SESSION['Nombre_Usuario']; ?></a> </li>
                            <li><a href="../../index.php?salir=si" name="salir">SALIR</a> </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

        </div>
    </section>
    <section class="download page" id="DOWNLOAD">
    <div class="available_store">
            <div class="container  wow bounceInRight" data-wow-duration="1s">
                <div class="col-md-6">
                    <div class="available_title">
                        <h2>Gestione su proyecto productivo</h2>
                        <p>Al costado derecho encontrara las diferentes gestiones que puede realizar en el poryecto productivo. </p>
                    </div>
                </div>

                <!-- DOWNLOADABLE STORE -->
                <div class="col-md-6">
                    <div class="row">
                        <a href="">
                            <div class="col-md-4 no_padding">
                                <div class="single_store">
                                    <i class="fa fa-apple"></i>
                                    <div class="store_inner">
                                        <li><a href="#evidencias">Evidencias Pendientes</a></li>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="col-md-4 no_padding">
                            <a href="">
                                <div class="single_store">
                                    <i class="fa fa-android"></i>
                                    <div class="store_inner">
                                        <li><a href="#Calificaciones">Calificaciones</a></li>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 no_padding">
                            <a href="">
                                <div class="single_store last">
                                    <i class="fa fa-windows"></i>
                                    <div class="store_inner">
                                        <li><a href="#Certificado">Certificados</a></li>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <!-- END DOWNLOADABLE STORE -->
            </div>
        </div>
        </section>
           <section class="about page" id="evidencias">  
         <form action="../../controlado_aprendiz/control_aprendiz.php?modo=Registro" method="post" enctype="multipart/form-data" >  
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- DOWNLOAD NOW SECTION TITLE -->
                    <div class="section_title">
                        <h2>EVIDENCIAS PENDIENTES</h2>
                        <p>Nos alegras que te decidieras a realizar un proyecto productivo, eso quiere decir que eres un aprendiz emprendedor, que no se muera ese espiritu...</p>
                    </div>
                        <div class="video_title">
                        <?php 
                        if ((isset($_SESSION['consultaEvdidenciasPendientes'])) and (!empty($_SESSION['consultaEvdidenciasPendientes'])) ){
                             $res_estado=$_SESSION['consultaEvdidenciasPendientes'];
                        ?>
                            <table class="table">
                             
                              <thead>
                                <tr>
                                 <th scope="col">Id Componente</th>
                                  <th scope="col">Nombre Evidencia</th>
                                  <th scope="col">Descripcion Evidencia</th>
                                  <th scope="col">Calificacion Evidencia</th>
                                  <th scope="col">Evidencia</th>
                                </tr>
                              </thead>
                              <tbody>                                
                                  <?php  
                                            
                                    $fila=$_SESSION['consultaEvdidenciasPendientes'];
                                 foreach ($res_estado as $clave => $valor){
                                    ?>                                                
                                  <tr>      
                                    <td><?php  echo $res_estado[$clave]['id_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['Nombre_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['Descripcion_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['calificacion_Evidencia'] ?></td>
                                   
                                    <td>  <input type="file" name="evidencia_doc" class="form-control" id="subject" placeholder="Carta"></td>
                                    <td><a href="frm_aprendiz.php?modo=subirEvidencia&cod=<?php echo $res_estado[$clave]['id_Evidencia']; ?>&nombre=<?php echo $res_estado[$clave]['Nombre_Evidencia']; ?>&des=<?php echo $res_estado[$clave]['Descripcion_Evidencia']; ?>&nota=<?php echo $res_estado[$clave]['calificacion_Evidencia']; ?>" class="badge badge-light link" style="margin-left: 35px;">Gestionar</a></td><br>
                                  <br>
                                  </tr><?php
                                  }
                                }else {
                                    echo '<div class="alert alert-info" role="alert" align="center">
                                               No tienes evidencias pendientes
                                                </div>';
                                  }
                                ?>
                                
                              </tbody>
                            </table>
                        </div>
                    <!--END DOWNLOAD NOW SECTION TITLE -->
                </div>
            </div>
        </div>

    </form>


   <?php  if ($_REQUEST['modo']=='subirEvidencia') {
    ?>
    <section class="subscribe parallax subscribe-parallax" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20" id="Calificaciones">
        <form action="../../controlado_aprendiz/control_aprendiz.php?modo=Registro" method="post" enctype="multipart/form-data" >
        <div class="section_overlay wow lightSpeedIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <!-- Start Subscribe Section Title -->
                        <div class="section_title">
                            <h2><?php echo $_REQUEST['nombre']; ?></h2>
                            <p><?php echo $_REQUEST['des']; ?></p>
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
                                            
                        <input type="hidden" name="u" value="6908378c60c82103f3d7e8f1c">
                        <input type="hidden" name="id" value="8c5074025d">
                            <div class="form-group">
                                <!-- EMAIL INPUT BOX -->                                  
                                <input type="file" name="evidencia_doc" class="form-control" id="subject" placeholder="Carta">                                 
                            </div>
                                <!-- SUBSCRIBE BUTTON -->
                            <button type="submit" class="btn btn-default subs-btn"  name="subir">Subir</button>
                            <input type="text"  class="form-control" value=<?php echo $_REQUEST['cod']; ?> name="id_evi" visible="true">
                        


                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
     <?php  }

    ?>
    </section>
           <section class="about page" id="Calificaciones">  
         <form action="../../controlado_aprendiz/control_aprendiz.php?modo=Registro" method="post" enctype="multipart/form-data" >  
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- DOWNLOAD NOW SECTION TITLE -->
                    <div class="section_title">
                        <h2>CALIFICACIONES</h2>
                        <p>Nos alegras que te decidieras a realizar un proyecto productivo, eso quiere decir que eres un aprendiz emprendedor, que no se muera ese espiritu...</p>
                    </div>
                        <div class="video_title">
                        <?php 
                        if ((isset($_SESSION['consultaEvdidencias'])) and (!empty($_SESSION['consultaEvdidencias'])) ){
                             $res_estado=$_SESSION['consultaEvdidencias'];
                        ?>
                            <table class="table">
                             
                              <thead>
                                <tr>
                                  <th scope="col">Nombre Evidencia</th>
                                  <th scope="col">Descripcion Evidencia</th>
                                  <th scope="col">Calificacion Evidencia</th>
                                  <th scope="col">Evidencia</th>
                                </tr>
                              </thead>
                              <tbody>                                
                                  <?php  
                                            
                                    $fila=$_SESSION['consultaEvdidenciasPendientes'];
                                 foreach ($res_estado as $clave => $valor){
                                    ?>                                                
                                  <tr>      
                                    <td><?php  echo $res_estado[$clave]['Nombre_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['Descripcion_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['calificacion_Evidencia'] ?></td>
                                    <td><?php  echo $res_estado[$clave]['Evidencia_Aprendiz'] ?></td>
                                    <?php if($res_estado[$clave]['Evidencia_Aprendiz']<>"Sin registrar") {                        
                                        ?>
                                        <td><a href="frm_aprendiz.php?modo=descarga&cod=<?php echo $res_estado[$clave]['FK_id_Componente']; ?>&nombre=<?php echo $res_estado[$clave]['Nombre_Evidencia']; ?>&des=<?php echo $res_estado[$clave]['Descripcion_Evidencia']; ?>&documento=<?php  echo $res_estado[$clave]['Evidencia_Aprendiz'] ?> &&nota=<?php echo $res_estado[$clave]['calificacion_Evidencia']; ?>" class="badge badge-light link" style="margin-left: 35px;">Descargar</a></td><br>

                                        <?php } ?>
                                    
                                   <br>
                                  </tr><?php
                                  }
                                }else {
                                    echo '<div class="alert alert-info" role="alert" align="center">
                                               No tienes evidencias pendientes
                                                </div>';
                                  }
                                ?>
                                
                              </tbody>
                            </table>
                        </div>
                    <!--END DOWNLOAD NOW SECTION TITLE -->
                </div>
            </div>
        </div>

    </form>
    </section>
<?php  if(isset($_REQUEST['documento']) and $_REQUEST['documento']<>"Sin registrar"){
  //$_REQUEST['documento']= "../../evidencias/".$_REQUEST['documento'];
    ?>
    <section class="contact page" id="evidencias1">
       <form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=evidencias" method="post" >
        <div class="section_overlay">
            <div class="container">
                <div class="video" "> 
                    <!-- Start Contact Section Title-->
                    <br><br><br><br><br><br>|
                        <iframe scrolling="auto" width="100%" height="100%" frameborder="0" src="../../evidencias/<?php  echo $_REQUEST['documento'];?>" style="min-height:900px;"></iframe>


                </div>
            </div>
        </div>
        </form>
    </section>
    <?php
}   
?>

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

