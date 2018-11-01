<?php
require('../includes/cls_ProyectoProductivo.php');
$modo=isset($_GET['modo'])? $_GET['modo']: 'default';

switch ($modo) { 

case 'inicio':
	session_start();
	if(isset($_POST['gestionar']) or !empty($_SESSION['consulta'])){
		$Estado_Solicitud_proyecto= new ProyectosProductivos();
		$res=$Estado_Solicitud_proyecto->Estado_proyecto('Curso');
			if($res<>1){
				session_start();
				$data=$res;	
				$_SESSION['consultaC']=$data;
				$_SESSION['error']="";			

			$res=$Estado_Solicitud_proyecto->Estado_proyecto('Pendientes');
				if($res<>1){
					session_start();
					$data=$res;	
					$_SESSION['consultaP']=$data;
					header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?Resultados='.count($_SESSION['consultaP']).'');
				}elseif($res==1){
					session_start();
					$_SESSION['consultaP']="";
					header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?info=NoHaySolicitudesP');
				}

			}elseif($res==1){
				session_start();
				$_SESSION['consultaC']="";
				header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?mensaje=NoHayProyectosCurso');
			}
	}elseif(isset($_POST['solicitudes'])){
		$Estado_Solicitud_proyecto= new ProyectosProductivos();
			$res=$Estado_Solicitud_proyecto->Estado_proyecto('Pendientes');
			if($res<>1){
				session_start();
				$data=$res;	
				$_SESSION['consultaP']=$data;

				$res=$Estado_Solicitud_proyecto->Estado_proyecto('Curso');
					if($res<>1){
						session_start();
						$data=$res;	
						$_SESSION['consultaC']=$data;
						$_SESSION['error']="";				
						header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?Resultados='.count($_SESSION['consultaC']).'');
						$res=$Estado_Solicitud_proyecto->Estado_proyecto('Pendientes');
					}elseif($res==1){
						session_start();
						$_SESSION['consultaC']="";
						header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?mensaje=NoHayProyectosCurso');
					}

				header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?Resultados='.count($_SESSION['consultaP']).'');
			}elseif($res==1){
				session_start();
				$_SESSION['consultaP']="";
				header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?info=NoHaySolicitudesP');
			}

	}else if (isset($_POST['aprobar'])){
		
		if(isset($_SESSION['consultaP'])){
			$res_estado=$_SESSION['consultaP'];
			foreach ($res_estado as $clave => $valor) {

				if($res_estado[$clave]['Codigo_Proyecto']==$_SESSION['id_cod_proP']){
					date_default_timezone_set('America/Lima'); 
        			$date = date('Y-m-d H:i:s');

        			$Tema_Proyecto=$res_estado[$clave]['Tema_Proyecto'];
        			$Estado_Solicitud=$res_estado[$clave]['Estado_Solicitud'];
        			$nombre_Proyecto=$res_estado[$clave]['nombre_Proyecto'];
        			$fkcodigo=$res_estado[$clave]['Codigo_Proyecto'];

					$aprobar_proyecto= new ProyectosProductivos();
					$res=$aprobar_proyecto->Cambiar_Estado_Solicitud_proyecto($fkcodigo,'Curso','Indefinido');
					
				}	
				if($res==1){
						$_SESSION['consulta']="rellenar";
						header('location: proyectosProductivos_Instructores.php?modo=inicio');
					}else{
						header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?error=no_se_cambio_Estado');
					}			
			}		 
		 	
				

			}else{	
				header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?seleccione_un_proyecto');
			}
	}


	break;

case 'componentes':
		
	if(isset($_REQUEST['valido']) and !empty($_REQUEST['valido']) ){//llamar componentes

		session_start();
		if(isset($_SESSION['Codigo_Proyecto']) || $_REQUEST['valido']=="Apre" ){

			$fkcodigo=$_SESSION['Codigo_Proyecto'];
			$componentes_proyecto= new ProyectosProductivos();
			$res=$componentes_proyecto->Componentes_proyecto($fkcodigo);

			if($res<>1){
				session_start();
				$data=$res;	
				$_SESSION['consultaComponentes']=$data;

				$res=$componentes_proyecto->Evidencias_proyecto($fkcodigo);

				if($res<>1){
					session_start();
					$data=$res;	
					$_SESSION['consultaEvidencias']=$data;
					if(isset( $_SESSION['id_cod_proP'])){
					
					header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=cali');
					}else{
						header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?modo=evidencias');
					}
				}elseif($res==1){
					$_SESSION['consultaEvidencias']="";
					header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?modo=evidencias&error=no_se_encontrsso_evidencias');	
				}
			}elseif($res==1){
				$_SESSION['consultaComponentes']="";
				$_SESSION['consultaEvidencias']="";
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?modo=componentes&error=no_se_encontro_componentes');	
			}

		}else{
		header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?seleccione_un_proyecto');
		}

	}elseif(isset($_POST['agregar_Componente'])){
		if(!empty($_POST['nombre_componente']) and !empty($_POST['Descripcion_componente'])){	

			session_start();
			$idUsu=$_SESSION['user'];
			$idpro=$_SESSION['Codigo_Proyecto'];

			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->Registrar_Componentes($idUsu,$idpro,$_POST['nombre_componente'],$_POST['Descripcion_componente']);

			if($res==1){
				session_start();
				$_SESSION['error']="";	
				header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=si');
			}else{
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noaprobado=verifique'.$res.'');
			}

		}else{	 
			header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=llenetodosloscampos');			
		}		
	}elseif(isset($_POST['editar_Componente'])){
		if(!empty($_POST['nombre_componente']) and !empty($_POST['estado_componente']) and !empty($_POST['Descripcion_componente']) ){	
			session_start();
			$idUsu=$_SESSION['user'];
			$idpro=$_SESSION['Codigo_Proyecto'];
			$idcom=$_SESSION['Codigo_Componente'];
			$aprobar_proyecto= new ProyectosProductivos();							

			if( $_POST['estado_componente']=="aprobar" ){
				$res=$aprobar_proyecto->validar_aprobado($idcom);
				if($res==1){
				session_start();
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?Error=validelasevidencias');
				}else{
				$res=$aprobar_proyecto->Actualizar_Componentes($idUsu,$idpro,$_POST['nombre_componente'],$_POST['Descripcion_componente'],$_POST['estado_componente'],$idcom);
				if($res==1){
					header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=si');
				}else{
					header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noseActualizo=error'.$res.'');
				}	
				}
				
			}else{
				$res=$aprobar_proyecto->Actualizar_Componentes($idUsu,$idpro,$_POST['nombre_componente'],$_POST['Descripcion_componente'],$_POST['estado_componente'],$idcom);
				if($res==1){
					header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=si');
				}else{
					header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noseActualizo=error'.$res.'');
				}	
			}
		}else{
			header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=llenelosdatos');
		}

	}elseif(isset($_POST['EliminarComponentes']) and !empty($_POST['EliminarComponentes'])){

			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->Eliminar_Componentes($_POST['EliminarComponentes']);

			if($res==1){
				session_start();
				$_SESSION['error']="";	
				header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=si');
			}else{
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noEliminado=Error'.$res.'');
			}

	}else{
		header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=paginasaltadas');
	}

break;

case 'evidencias':
		
	if(isset($_REQUEST['valido1']) and !empty($_REQUEST['valido1'])){//llamar Actividades

		session_start();
		if(isset($_SESSION['Codigo_Proyecto'])){

			$fkcodigo=$_SESSION['Codigo_Proyecto'];
			$componentes_proyecto= new ProyectosProductivos();
			$res=$componentes_proyecto->Evidencias_proyecto($fkcodigo);

			if($res<>1){
				session_start();
				$data=$res;	
				$_SESSION['consultaEvidencias']=$data;
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?modo=evidencias');
			}elseif($res==1){
				$_SESSION['consultaEvidencias']="";
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?modo=evidencias&error=no_se_encontro_evidencias');	
			}

		}else{
		header('location: ../formularios/Instructores/frm_solicitudes_proyPro_Ins.php?seleccione_un_proyecto');
		}

	}elseif(isset($_POST['agregar_Evidencia'])){
		if(!empty($_POST['Nombre_Evidencia']) and !empty($_POST['Descripcion_Evidencia']) and !empty($_POST['cod_compo']) ){

			session_start();
			$idUsu=$_SESSION['user'];
			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->Registrar_Evidencias($idUsu,$_POST['Nombre_Evidencia'],$_POST['Descripcion_Evidencia'],$_POST['cod_compo']);

			if($res==1){
				session_start();
				$_SESSION['Codigo_co']="";
				$_SESSION['error']="";	
				header('location: proyectosProductivos_Instructores.php?modo=evidencias&valido1=si');
			}else{
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noaprobado=verifique'.$res.'');
			}

		}else{	 
			session_start();
			header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=llenetodosloscampos');			
		}		
	}elseif(isset($_POST['EditarEvidencias'])){

			session_start();
			 $_SESSION['CCC']=$_POST['Nombre_Evidencia'];
		if( !empty($_POST['Nombre_Evidencia']) and !empty($_POST['Calificacion_Evidencia']) and !empty($_POST['Descripcion_Evidencia']) AND isset($_SESSION['Codigo_evidencia']) ){	

			$idUsu=$_SESSION['user'];

			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->Actualizar_Evidencias($idUsu,$_POST['Nombre_Evidencia'],$_POST['Descripcion_Evidencia'],$_POST['Calificacion_Evidencia'],$_SESSION['Codigo_evidencia']);

			if($res==1){
				session_start();
				$_SESSION['error']="";	
				header('location: proyectosProductivos_Instructores.php?modo=evidencias&valido1=si');
			}else{
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noseActualizo=error'.$res.'');
			}
		}else{
			header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=llenetodosloscampos');
		}

	}elseif(isset($_POST['EliminarEvidencia']) AND !empty($_POST['EliminarEvidencia'])){
		
			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->Eliminar_Evidencias($_POST['EliminarEvideCcia']);

			if($res==1){
				session_start();
				$_SESSION['error']="";	
				header('location: proyectosProductivos_Instructores.php?modo=evidencias&valido1=si');
			}else{
				header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?noEliminado=Error'.$res.'');
			}
	}elseif(isset($_POST['cancelar']) ){

			header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php');
	}else{
		header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=paginasaltadas');
	}

break;

case 'Gestionar':

	if (isset($_POST['ComponentesProyecto']) ){
		header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=si');
	}elseif(isset($_POST['ActividadesProyecto']) ){
		header('location: proyectosProductivos_Instructores.php?modo=evidencias&valido1=si');
	}elseif(isset($_REQUEST['code']) ){
		session_start();
		$_SESSION['consulta']="rellenar";
		header('location: proyectosProductivos_Instructores.php?modo=componentes&valido=rellenar');
	}else{
		header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=paginasaltada');
	}

	break;

case 'aprobarFinal':

	if (isset($_POST['Aprobar_proyecto']) ){

			$aprobar_proyecto= new ProyectosProductivos();
			$res=$aprobar_proyecto->validar_aprobado_Proyecto($_POST['Aprobar_proyecto']);

				if($res==2){
					if(empty($_SESSION['error'])){
						$res=$aprobar_proyecto->Cambiar_Estado_Solicitud_proyecto($_POST['Aprobar_proyecto'],'Finalizado','definido');

					if($res==1){
						header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?exitoso=proyecto_aprobado');
					}else{
						header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=no_se_cambio_Estado');
					}
				}else{
					header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=mysql');
				}
	}else{
		header('location: ../formularios/Instructores/frm_gestion_Soli_PP.php?error=paginasaltadafina');
	}
}
	break;

}
?>
