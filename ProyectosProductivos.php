<?php 

require('includes/cls_ProyectoProductivo.php');
$modo=isset($_GET['modo'])? $_GET['modo']: 'default';
switch ($modo) {

	case 'Validar':
	session_start();
	echo "si esta entrando";
	if(isset($_POST['Validar']) or isset($_SESSION['user'])){
		if(!empty($_POST['txt_Validar']) or !empty($_SESSION['user'])){
			if(!empty($_POST['txt_Validar'])){
				$Validar_Solicitud=new ProyectosProductivos();
				$res=$Validar_Solicitud->Validar($_POST['txt_Validar']);
			}else{
				$Validar_Solicitud=new ProyectosProductivos();
				$res=$Validar_Solicitud->Validar($_SESSION['user']);
			}
				if($res==1){
					header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros&error=no_tiene_registro');
					////no registrado
					$_SESSION['consultaV']="";
				}else{
					session_start();
					$data=$res;	
					$_SESSION['consultaV']=$res;
					header('location: formularios/frm_Solicitud_ProyPro.php?modo=Estado');//registrado
				}

			}else{
				header('location: formularios/frm_Solicitud_ProyPro.php?modo=Validar&error=llenetodos_campos');//llene	
			}
		}else{
		header('location: formularios/frm_Solicitud_ProyPro.php');
	}
		break;

	case 'Registro':
	if(isset($_POST['registro'])){
		session_start();					
		if(isset($_SESSION['user'])){	
			if(!empty($_SESSION['user']) and  !empty($_POST['txt_tema']) and  !empty($_POST['txt_nombre']) ) { 
				$consultar=new ProyectosProductivos();
				$res=$consultar->Validar($_SESSION['user']);
				if($res<>1){
					session_start();
					$data=$res;	
					$_SESSION['consulta']=$data;
					header('location: formularios/frm_Solicitud_ProyPro.php?modo=Estado');
				}else if($res==1){
					$nombre_imagen=$_FILES['img_carta']['name'];
					$tipo_imagen=$_FILES['img_carta']['type'];
					$tamaño_imagen=$_FILES['img_carta']['size'];
					
					if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" ||$tipo_imagen=="image/png"){				
						$carpeta_destino='Imagenes/';
						if($tamaño_imagen<=1000000){									
							$Validar_Solicitud=new ProyectosProductivos();
							$res=$Validar_Solicitud->registro_Proyecto($_SESSION['user'],$_POST['txt_tema'],$_POST['txt_nombre'],
								$nombre_imagen,'Pendientes');						
							if($res==1){
								move_uploaded_file($_FILES['img_carta']['tmp_name'], $carpeta_destino.$nombre_imagen);		
								session_start();
								$_SESSION['error']="";
								header('location: ProyectosProductivos.php?modo=Validar');
							}else if($res<>1){
								session_start();
								$_SESSION['error']=$res;
								header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros&error=nose_registro_valide_su_id'.$res.'');//no aprobado
							}

						}else{											
							header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros&error=tamaño');
						}
					}else{
						header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros&error=Tipodearchivo_erroneo');
					}
				}	
			}else{
				header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros&error=llenetodos_campos');
			}
		}else{
			session_start();
			$_SESSION['error']="1";
			$error=$_SESSION['error'];					
			header('location: formularios/frm_login.php?errores=Inicie_session');
		}
	}else{
		header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros');
	}
			
		break;
		


}
 ?>
