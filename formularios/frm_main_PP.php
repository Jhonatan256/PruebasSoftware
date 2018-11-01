<?php 
session_start();
if(isset($_SESSION['user'])){
  header('location: frm_index.php');
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
<section class="bienvenidos">
<header class="encabezado">
  <nav class="navbar navbar-light navbar-fixed-top">
  <div class="container">
  <button class="navbar-toggler hidden-md-up float-xs-right" type="button" data-toggle="collapse" data-target="#menuprincipal">
    &#9776;
  </button>
  <a class="navbar-brand" href="#">PROYECTOS PRODUCTIVOS</a>
  <div class="collapse navbar-toggleable-sm float-md-right" id="menuprincipal">

    <ul class="nav navbar-nav">
       <li class="nav-item active">
        <a class="nav-link" href="#">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Nosotros</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#"> Servicios</a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="#">Portafolio</a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
      </li>


    </ul>
  </div>
  </div>
</nav>

</header>


<div class="texto-bienvenido text-xs-center">
<div class="btn-group  btn-group-lg" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-secondary">Actividades</button>
  <button type="button" class="btn btn-secondary">Evidencias</button>
  <button type="button" class="btn btn-secondary">Informacion General</button>
</div>
</div>



 </section> 

<section class="bienvenidos">
 <div class="texto-bienvenido text-xs-center">
<h1 class="display-4 mb-3">Actividades:</h1>

<a href="#" class="btn btn-primary btn-lg">Uneté a nuestra comunidad</a>
</div>



 </section> 

<section class="bienvenidos">
 <div class="texto-bienvenido text-xs-center">
<p class="h5">Bievenidos a nuestro mundo</p>
<h1 class="display-4 mb-3">PROYECTOS PRODUCTIVOS</h1>
<a href="#" class="btn btn-primary btn-lg">Uneté a nuestra comunidad</a>
</div>



 </section> 

<section class="bienvenidos">
 <div class="texto-bienvenido text-xs-center">
<p class="h5">Bievenidos a nuestro mundo</p>
<h1 class="display-4 mb-3">PROYECTOS PRODUCTIVOS</h1>
<a href="#" class="btn btn-primary btn-lg">Uneté a nuestra comunidad</a>
</div>



 </section> 
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
       <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body> 
</html>