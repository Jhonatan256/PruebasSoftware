<?php

require('../includes/class_evidencia.php');

$modo=isset($_GET['modo'])? $_GET['modo']: 'default';

switch ($modo) { 

case 'estado':

	if(isset($_POST['gestionar'])){
		session_start();
		if(isset($_SESSION['consultaV'])){
			 $res_estado=$_SESSION['consultaV'];
			if($res_estado['Estado']="Curso"){
				header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=inicio');
			}else{
				header('location: ../formularios/frm_Solicitud_proypro.php?modo=Estado&mensaje=Nosepuedegestionar');
			} 
		}

	}else{
		header('location: ../formularios/frm_Solicitud_proypro.php?mensaje=Nosepuedegestionar');
	}
break;

case 'inicio':
	session_start();	
	if(isset($_SESSION['user'])  ){
		$Evidencias = new evidencia();

		$res=$Evidencias->consultar_Calificaciones_Pendientes($_SESSION['user']);
			if($res<>1){				
				$data=$res;	
				session_start();
				$_SESSION['consultaEvdidenciasPendientes']=$data;
			}else{
				$_SESSION['consultaEvdidenciasPendientes']="";	
			}

			$res=$Evidencias->consultar_Calificaciones($_SESSION['user']);
			if($res<>1){				
				$data=$res;	
				session_start();
				$_SESSION['consultaEvdidencias']=$data;
				$_SESSION['error']="";
			header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=proyecto');	

			}else{
				$_SESSION['consultaEvdidencias']="";	
				if(isset($_SESSION['error'])){
					if (!empty($_SESSION['error']) ) {
						header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=error_Consulta');
					}
				}
				header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=proyecto');
			}

	if(isset($_POST['certificado'])){


	require_once('../fpdf181/fpdf.php');

	$pdf = new FPDF();
	$pdf->addPage();
	$pdf->SetFont('arial','B',15);
	$pdf->SetXY(60,30);
	$pdf->cell(100,10,'CERTIFICADO',0,1,'C');
	$pdf->SetXY(20,60);
	$pdf->Multicell(180,10,'La area de emprendimiento del Centro de Diseño y Metrologia certifica que 	 aprobo todos los componentes registrados para el desarrollo de su proyecto productivo por lo tanto se aprueba de manera satisfactoria el proceso anteriormente nombrado.',0,'C',0);
$pdf->SetXY(20,110);
	$pdf->Multicell(180,10,'El aprendiz realizo el proyecto entre tan y tan fechas.',0,'C',0);
	$pdf->SetXY(20,130);
	$pdf->Multicell(180,10,'Se expide el dia de hoy.',0,'C',0);


	$pdf->output();
	exit();

}elseif (isset($_POST['gestionar'])){

		$Evidencias = new evidencia();

		$res=$Evidencias->consultar_Calificaciones_Pendientes($_SESSION['user']);
			if($res<>1){				
				$data=$res;	
				session_start();
				$_SESSION['consultaEvdidenciasPendientes']=$data;
			}else{
				$_SESSION['consultaEvdidenciasPendientes']="";	
			}

			$res=$Evidencias->consultar_Calificaciones($_SESSION['user']);
			if($res<>1){				
				$data=$res;	
				session_start();
				$_SESSION['consultaEvdidencias']=$data;
				$_SESSION['error']="";
			header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=proyecto');	

			}else{
				$_SESSION['consultaEvdidencias']="";	
				if(isset($_SESSION['error'])){
					if (!empty($_SESSION['error']) ) {
						header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=error_Consulta');
					}
				}
				header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=proyectoNo');
			}
	
	}		
}	

	break;

	case 'componentes':

	session_start();

		if(isset($_SESSION['id_cod_proP']) ){ 
				header('location: ../controlador_Instructores/proyectosProductivos_Instructores.php?modo=componentes&valido=Apre');
			}else{
				header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=cali&nosecargocomopentes2');
			}	
			
	

	break;

case 'Registro':
	if(isset($_POST['subir']) ){
		session_start();			
			$nombre_imagen=$_FILES['evidencia_doc']['name'];
			$tipo_imagen=$_FILES['evidencia_doc']['type'];	
			$tamaño_imagen=$_FILES['evidencia_doc']['size'];
						

	if($tipo_imagen=="application/pdf" || $tipo_imagen=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"|| $tipo_imagen=="application/vnd.ms-excel" || $tipo_imagen=="application/msword" || $tipo_imagen=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $tipo_imagen=="application/vnd.openxmlformats-officedocument.presentationml.presentation" || $tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" ||$tipo_imagen=="image/png" ){	
				echo "virtual2";
						$carpeta_destino='../evidencias/';
						if($tamaño_imagen<=1000000){									
							$Validar_Solicitud=new evidencia();

							$res=$Validar_Solicitud->subir_evidencia($nombre_imagen, $_POST['id_evi']);						
							if($res==1){
								move_uploaded_file($_FILES['evidencia_doc']['tmp_name'], $carpeta_destino.$nombre_imagen);		
								session_start();
								$_SESSION['error']="";
								header('location: control_aprendiz.php?modo=inicio');
							}else if($res<>1){
								$_SESSION['error']=$_POST['id_evi'];
								header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=Registros&error=nose_registro'.$res.'');//no aprobado
							}

						}else{			
					session_start();

							header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=Registros&error=tamaño');
						}
					}else{

					session_start();
						$_SESSION['error']=$_FILES['evidencia_doc']['type'];
							header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=error_tipo_archivoo'.$_POST['subir'].'asdad');

				
					}
					
			}else{
					header('location: ../formularios/Aprendiz/frm_aprendiz.php?modo=Registros&error=seleccioneunaevidencia');
			}
	
		break;
}
?>