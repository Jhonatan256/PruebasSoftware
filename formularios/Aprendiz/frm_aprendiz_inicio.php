<?php 
session_start();
if(isset($_SESSION['user']) and isset($_SESSION['rol'])){
  if($_SESSION['rol']==2){
    header("location: Instructores/frm_ProyPro_Instructores.php");
  }
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../estilos/css/bootstrap.css">
<!-- Carga de fuentes de Font  Awesome -->
<link rel="stylesheet" href="../estilos/css/font-awesome.min.css">

<!-- Carga de estilos css personalizados -->
<link rel="stylesheet" href="../estilos/css/estilos.css">
 

  </head>
  <body>   
    
<?php 
$modo=isset($_GET['modo'])? $_GET['modo']: $modo="Validar";
switch ($modo) {

   case 'inicio':   
  ?>
 <form action="../../controlado_aprendiz/control_aprendiz.php?modo=inicio" method="post" enctype="multipart/form-data" >     
 <section>
  <?php
    if(isset($_REQUEST['errores'])){
      ?> <div class="alert alert-danger text-xs-center"    role="alert">
  Identificacion o contraseña equivocada.
</div> <?php
    }
    ?>
  

   <div class="cuadro_registro2">
    <div class="titulos "> 
  <!--  <p class="titulo" >Cree su cuenta</p>-->
        <p style="font-size: 45px">gestion Proyectos</p>
 
 
      <div class="datos">


   <div class="botones">

   <button type="submit" name="gestion_Actividades" class="form-control btn btn-primary"  style="height: 60px;">Gestionar actividades Proyecto</button>
  <button type="submit" name="ver_componentes" class="form-control btn btn-primary"  style="height: 60px;">ver componentes Proyecto</button>
  <button type="submit" name="ver_calificaciones" class="form-control btn btn-primary"  style="height: 60px;">Ver Calificaciones Proyecto</button>

  </div>
  </div>

<div class="btn">
    <input type="hidden" name="reg" value="1"/> 
  <button type="submit" name="registro" class="form-control btn btn-primary2"  style="height: 60px;">Registrar</button>
</div>
</div>
  </div> <!--FIN DEL CUADRO-->

  </form>
   
<?php
     break;

  case 'actividades':   
  ?>
 <form action="../../controlado_aprendiz/control_aprendiz.php?modo=actividades" method="post" enctype="multipart/form-data" >     
 <section>
  <?php
    if(isset($_REQUEST['errores'])){
      ?> <div class="alert alert-danger text-xs-center"    role="alert">
  Identificacion o contraseña equivocada.
</div> <?php
    }
    ?>
  

   <div class="cuadro_registro2">
    <div class="titulos "> 
  <!--  <p class="titulo" >Cree su cuenta</p>-->
        <p style="font-size: 45px">gestion Proyectos</p>
        <p style="font-size: 45px">gestion actividades</p>
 
      <div class="datos">


   <div class="botones">

   <button type="submit" name="gestion_Actividades" class="form-control btn btn-primary"  style="height: 60px;">Gestionar actividades Proyecto</button>
  <button type="submit" name="ver_componentes" class="form-control btn btn-primary"  style="height: 60px;">ver componentes Proyecto</button>
  <button type="submit" name="ver_calificaciones" class="form-control btn btn-primary"  style="height: 60px;">Ver Calificaciones Proyecto</button>

  </div>
  </div>

<div class="btn">
    <input type="hidden" name="reg" value="1"/> 
  <button type="submit" name="registro" class="form-control btn btn-primary2"  style="height: 60px;">Registrar</button>
</div>
</div>
  </div> <!--FIN DEL CUADRO-->

  </form>
   
<?php
     break;
}
?>
 
    </body>

   
</html>