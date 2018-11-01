<?php  
session_start();
echo $_SESSION['error'];

if(isset($_REQUEST['cod']) or isset($_SESSION['Codigo_Proyecto']) and !empty($_REQUEST['cod']) or !empty($_SESSION['Codigo_Proyecto'])){
    if(!empty($_REQUEST['cod'])){
        $_SESSION['Codigo_Proyecto'] =$_REQUEST['cod'];
    }
}else{
   header('location: frm_solicitudes_proyPro_Ins.php?error=nosalteelformulario');  
}
$modo=isset($_GET['modo'])? $_GET['modo']: 'default';
 if ($modo=="inicio"){
$_SESSION['nombre']= $_REQUEST['nombre'];
$_SESSION['tema']= $_REQUEST['tema'];
  header('location: ../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=Gestionar&code=1');  
 }else{
    
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
    <title>Centro de Diseño y Metrología | PROYECTOS PRODUCTIVOS SENA</title>
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
                            <li><a href="frm_solicitudes_proyPro_Ins.php?modo=salir">PROYECTOS PRODUCTIVOS </a> </li>
                            <li><a ><?PHP echo $_SESSION['user']; ?></a> </li>
                            <li><a href="../../index.php?salir=si" name="salir">SALIR</a> </li>
                            <li><a>//</a> </li> 
                        </ul>
                        <ul class="nav navbar-nav navbar-left">
                            <!-- NAV -->                          
                            <li><a href="#DOWNLOAD">INICIO</a> </li>
                            <li><a href="#componentes">COMPONENTES</a> </li>
                            <li><a href="#evidencias">EVIDENCIAS </a> </li> 
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>


        </div>
        </form>
    </section>
  <?php  if( !isset($_REQUEST['exitoso']) ){
    ?>
    <section class="download page" id="DOWNLOAD">
        <form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=aprobarFinal" method="post" >
        <div class="available_store">
            <div class="container  wow bounceInRight" data-wow-duration="1s">
                <div class="col-md-6">
                    <div class="available_title">
                        <h2>Nombre del proyecto: <?php echo $_SESSION['nombre'];?></h2>
                        <p>Tema: <?php echo $_SESSION['tema'];?></p>
                        <button type="submit" name="Aprobar_proyecto" value ="<?php echo $_SESSION['Codigo_Proyecto']; ?>" class="form-control btn btn-primary" >Aprobar</button>
                    </div>
                </div>

                <!-- DOWNLOADABLE STORE -->
                <div class="col-md-6">
                    <div class="row">
                        <a href="#componentes">
                            <div class="col-md-6 no_padding">
                                <div class="single_store">
                                    <i ><img src="../../images/ajustes.png" alt="" style="margin-top: 50px;"></i>
                                    <div class="store_inner">
                                        <h2>COMPONENTES</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="col-md-6 no_padding">
                            <a href="#evidencias">
                                <div class="single_store">
                                    <i ><img src="../../images/calificaciones.png" alt="" style="margin-top: 50px;"></i>
                                    <div class="store_inner">
                                        <h2>EVIDENCIAS</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END DOWNLOADABLE STORE -->
            </div>
        </div>
    </form>
    </section>

    <section class="contact page" id="componentes">
   <form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=componentes" method="post" >
        <div class="section_overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 wow bounceIn">
                    <!-- Start Contact Section Title-->
                    <div class="section_title">
                        <h2>COMPONENTES</h2>
                        <p>En este espacio usted podrá registrar modificar o eliminar elementos para el proyecto seleccionado anteriormente</p>
                    </div>
                </div>
            </div>

            <div class="contact_form wow bounceIn">
                <div class="container">
                       <div class="video">
                        <?php
                          if ((isset($_SESSION['consultaComponentes'])) and (!empty($_SESSION['consultaComponentes'])) ){
                            $res_estado=$_SESSION['consultaComponentes'];?>
                        <table class="table">
                              <thead>
                                <tr>
                                <th scope="col">Id Componente</th>
                                <th scope="col">Nombre Componente</th>
                                <th scope="col">Descripcion Componente</th>
                                <!--<th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                                <th scope="col">Codigo Proyecto</th> -->
                                <th scope="col">Estado</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                foreach ($res_estado as $clave => $valor) {
                                  ?>
                                     <tr>
                                       <td><?php  echo $res_estado[$clave]['id_Componente'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['nombre_componente'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['Descripcion_componente'] ?></td>
                                        <!--<td><?php  echo $res_estado[$clave]['fecha_Inicio'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['Fecha_Fin'] ?></td> -
                                        <td><?php  echo $res_estado[$clave]['FK_cod_Proyecto'] ?></td> -->
                                        <td><?php  echo $res_estado[$clave]['Estado'] ?></td> 
                                        <?php if($res_estado[$clave]['Estado']=="aprobar"){
                                        }else{
                                            ?>
                                        <td><a href="frm_gestion_Soli_pp.php?id=<?php  echo $res_estado[$clave]['id_Componente'] ?>&nombre=<?php  echo $res_estado[$clave]['nombre_componente'] ?>&Des=<?php  echo $res_estado[$clave]['Descripcion_componente'] ?>&estado=<?php  echo $res_estado[$clave]['Estado'] ?>&codpro=<?php  echo $res_estado[$clave]['FK_cod_Proyecto'] ?>">Editar</a> </td>

                                        <td><button type="submit" name="EliminarComponentes" value ="<?php echo $res_estado[$clave]['id_Componente']; ?>" class="form-control btn btn-primary" >Eliminar</button></td> <br> 
                                         <?php }?>
                                        
                                      </tr>
                                  <?php
                                 }?>                         
                              </tbody>
                            </table>
                             <?php                          
                          }else {
                            echo "No hay componentes registrados"; 
                          }
                          ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <?php if(isset($_REQUEST['id']) and isset($_REQUEST['nombre']) and isset($_REQUEST['Des']) and isset($_REQUEST['estado']) and isset($_REQUEST['codpro'])) {
                       
                              $_SESSION['Codigo_Proyecto']=$_REQUEST['codpro'];
                              $_SESSION['Codigo_Componente']=$_REQUEST['id'];
                              ?>
                              <input type="text" class="form-control" name="nombre_componente" id="name" placeholder="NOMBRE COMPONENTE" value="<?php echo $_REQUEST['nombre'];?>">
                              <SELECT class="form-control" name="estado_componente">
                                <OPTION>Pendiente</OPTION>
                                <OPTION>aprobar</OPTION>
                              </SELECT>
                              <!-- <input type="text" class="form-control" name="estado_componente" id="estado" placeholder="ESTADO COMPONENTE" value="<?php echo $_REQUEST['estado'];?>">-->
                              <?php 
                              }else{
                                ?>
                                <input type="text" class="form-control" name="nombre_componente" id="name" placeholder="NOMBRE COMPONENTE">
                                <?php
                                } ?>                                                          
                            </div>

                            <div class="col-md-8">
                            <?php if(isset($_REQUEST['id']) and isset($_REQUEST['nombre']) and isset($_REQUEST['Des']) and isset($_REQUEST['estado'])) {
                              ?>
                              <textarea  class="form-control" id="message" name="Descripcion_componente" rows="25" cols="10"
                               value="<?php echo $_REQUEST['Des'];?>" placeholder="<?php echo $_REQUEST['Des'];?>"><?php echo $_REQUEST['Des'];?></textarea>
                               <button type="submit" name="editar_Componente" class="form-control btn btn-primary submit-btn" >EDITAR COMPONENTE</button>
                              <?php 
                              } else{
                                ?>
                                <textarea class="form-control" id="message" name="Descripcion_componente" rows="25" cols="10" placeholder="  DESCRIPCION..."></textarea>
                                <button type="submit" name="agregar_Componente" class="form-control btn btn-primary submit-btn" >AGREGAR COMPONENTE</button>
                                <?php
                                } ?>

                                
                                
                            </div>
                        </div>
                   <!-- </form>
                    END FORM --> 
                </div>
            </div>
        </div>
    </form>
    </section>
     <?php
        if ((isset($_SESSION['consultaEvidencias'])) and (!empty($_SESSION['consultaEvidencias'])) ){
      ?>
    <section class="contact page" id="evidencias">
       <form action="../../controlador_Instructores/proyectosProductivos_Instructores.php?modo=evidencias" method="post" >
        <div class="section_overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 wow bounceIn">
                    <!-- Start Contact Section Title-->
                    <div class="section_title">
                        <h2>EVIDENCIAS</h2>
                        <p>En este espacio usted podrá registrar modificar o eliminar las evidencias para el proyecto seleccionado anteriormente</p>
                    </div>
                </div>
            </div>

            <div class="contact_form wow bounceIn">
                <div class="container">
                       <div class="video">
                        <?php
                          if ((isset($_SESSION['consultaEvidencias'])) and (!empty($_SESSION['consultaEvidencias'])) ){
                            $res_estado=$_SESSION['consultaEvidencias'];?>
                        <table class="table">
                              <thead>
                                <tr>
                                <th scope="col">id_Evidencia</th>
                                <th scope="col">Nombre_Evidencia</th>
                                <th scope="col">Descripcion_Evidencia</th>
                                <th scope="col">Evidencia_Aprendiz</th>
                                <th scope="col">Componente</th>
                                <!--<th scope="col">Fk_Id_usuario</th> -->
                                <th scope="col">Estado Evidencia</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                foreach ($res_estado as $clave => $valor) {
                                  ?>
                                     <tr>
                                       <td><?php  echo $res_estado[$clave]['id_Evidencia'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['Nombre_Evidencia'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['Descripcion_Evidencia'] ?></td>
                                        <td><a href="#evidencias1" name="doc"><?php  echo $res_estado[$clave]['Evidencia_Aprendiz'] ?></a></td>
                                        <?php $_POST['documento'] = $res_estado[$clave]['Evidencia_Aprendiz'] ; ?>
                                        <td><?php  echo $res_estado[$clave]['FK_id_Componente'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['Fk_Id_usuario'] ?></td>
                                        <td><?php  echo $res_estado[$clave]['calificacion_Evidencia'] ?></td> 

                                         <?PHP  if($res_estado[$clave]['calificacion_Evidencia']=="Por Evaluar" OR $res_estado[$clave]['calificacion_Evidencia']=="D"){
                                          ?> <td><a href="frm_gestion_Soli_pp.php?id=<?php  echo $res_estado[$clave]['id_Evidencia'] ?>&nombre=<?php  echo $res_estado[$clave]['Nombre_Evidencia'] ?>&Des=<?php  echo $res_estado[$clave]['Descripcion_Evidencia'] ?>&documento=<?php  echo $res_estado[$clave]['Evidencia_Aprendiz'] ?>&calificacion=<?php  echo $res_estado[$clave]['calificacion_Evidencia'] ?>&FK_id_Componente=<?php  echo $res_estado[$clave]['FK_id_Componente'] ?>" >Editar</a> </td>
                                          <td><a href="" disabled="false"></a></td>
<td><button type="submit" name="EliminarEvidencia" value ="<?php echo $res_estado[$clave]['id_Evidencia']; ?>" class="form-control btn btn-primary" >Eliminar</button></td> <br> 
                                      </tr>
                                          <?php
                                            }else{
                                              ?> 
    
                                          <?PHP  } ?>
                                    
                      
                                        
                                  <?php
                                
                                 }?>                         
                              </tbody>
                            </table>
                             <?php                          
                          }else {
                            echo "No hay evidencias registradas"; 
                          }
                          ?>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                            <?php if(isset($_REQUEST['id']) and isset($_REQUEST['nombre']) and isset($_REQUEST['Des']) and isset($_REQUEST['calificacion']) and isset($_REQUEST['FK_id_Componente'])) {

                               
                              $_SESSION['Codigo_evidencia']=$_REQUEST['id'];
                              ?>
                              <input type="text" class="form-control" name="Nombre_Evidencia" id="name" placeholder="NOMBRE EVIDENCIA" value="<?php echo $_REQUEST['nombre'];?>">
                              <SELECT class="form-control" name="Calificacion_Evidencia">
                              <?php if($_REQUEST['documento']=="Sin registrar" ) {
                                  ?> <OPTION>D</OPTION> <?php
                              }else{
                                ?>
                                <OPTION>A</OPTION>
                                <OPTION>D</OPTION>
                                <?php
                              }
                              ?>
                                
                              </SELECT>
                            <button type="submit" name="cancelar" class="form-control btn  submit-btn" >CANCELAR </button>
                               <!--<input type="text" class="form-control" name="Calificacion_Evidencia" id="estado" placeholder="ESTADO EVIDENCIA" value="<?php echo $_REQUEST['calificacion'];?>">-->

                              <?php }else{ ?>

                                <input type="text" class="form-control" name="Nombre_Evidencia" id="name" placeholder="NOMBRE EVIDENCIA">
                                <select name="cod_compo" class="form-control">
                                    <?php 
                                      $res_estado=$_SESSION['consultaComponentes'];
                                        foreach ($res_estado as $clave => $valor) {
                                          $id= $res_estado[$clave]['id_Componente'];
                                      ?>
                                        <option value=<?php echo $id;?> > <?php  echo $res_estado[$clave]['nombre_componente'] ?></option>
                                           <?php  
                                        }
                                    ?>
                                    </select>
                                <?php } ?>                                                          
                            </div>

                            <div class="col-md-8">
                           <?php if(isset($_REQUEST['id']) and isset($_REQUEST['nombre']) and isset($_REQUEST['Des']) and isset($_REQUEST['calificacion']) and isset($_REQUEST['FK_id_Componente'])) {
                              ?>
                              <textarea  class="form-control" id="message" name="Descripcion_Evidencia" rows="25" cols="10"
                               value="<?php echo $_REQUEST['Des'];?>" placeholder="<?php echo $_REQUEST['Des'];?>"><?php echo $_REQUEST['Des'];?> </textarea>

                               <button type="submit" name="EditarEvidencias" class="form-control btn btn-primary submit-btn" >EDITAR EVIDENCIA</button>
                               

                              <?php 
                              } else{ ?>

                                <textarea class="form-control" id="message" name="Descripcion_Evidencia" rows="25" cols="10" placeholder="  DESCRIPCION..."></textarea>

                                <button type="submit" name="agregar_Evidencia" class="form-control btn btn-primary submit-btn" > AGREGAR EVIDENCIA</button>
                                <?php
                                } ?>                                
                                
                            </div>
                        </div>
                   <!-- </form>
                    END FORM --> 
                </div>
            </div>
        </div>
      </form>
</section>
<?php }else{

  }
  ?>
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

}elseif(isset($_REQUEST['exitoso']) and $_REQUEST['exitoso']="proyecto_aprobado"){
    ?>

    <section class="contact page" id="CONTACT">
        <div class="section_overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 wow bounceIn">
                    <!-- Start Contact Section Title-->
                    <div class="section_title">
                        <h2>¡PROYECTO PRODUCTIVO APROBADO!</h2>
                        <p>El proyecto tan se aprobo de manera satisfactoria, acontinuacion podra encontrar
                        las generalidades que se tienen a lo largo del proyecto:
                    componentes y evidencias asignados, fechas de inicio y fecha de fin. </p>
                    </div>
                </div>
            </div>

                <section class="fun_facts parallax">
        <div class="section_overlay">
            <div class="container wow bounceInLeft" data-wow-duration="1s">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="single_fun_facts">
                            <i class="pe-7s-cloud-download"></i>
                            <h2><span  class="counter_num">699</span> <span>+</span></h2>
                            <p>COMPONENTES</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single_fun_facts">
                            <i class="pe-7s-look"></i>
                            <h2><span  class="counter_num">1999</span> <span>+</span></h2>
                            <p>EVIDENCIAS</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single_fun_facts">
                            <i class="pe-7s-comment"></i>
                            <h2><span  class="counter_num">199</span> <span>+</span></h2>
                            <p>FECHAS INICIO</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single_fun_facts">
                            <i class="pe-7s-cup"></i>
                            <h2><span  class="counter_num">10</span> <span>+</span></h2>
                            <p>FECHAS FIN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow bounceInLeft">
                        <div class="social_icons">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a>
                                </li>
                                <li><a href=""><i class="fa fa-behance"></i></a>
                                </li>
                                <li><a href=""><i class="fa fa-youtube-play"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

