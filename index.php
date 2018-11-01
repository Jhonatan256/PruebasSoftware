<?php
require('includes/clase_Usuario.php');
	 if(isset($_POST['Salir']) or isset($_REQUEST['salir'])){ 
	 	  	session_start();	
		session_destroy();
		$salir= new Usuario($_SESSION['user'],'','','','','','');  	
  	if($salir->salir()>0){
	  	session_start();	
		session_destroy();
  		header('location: formularios/frm_login.php');
		}else{	
		header('location: formularios/frm_index.php?errores=nocerrosesion');	
		}

	 }else if(isset($_POST['Login'])){
	 	header('location: formularios/frm_login.php');
	 }

?>