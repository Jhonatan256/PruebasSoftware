<?php

$modo=isset($_GET['modo'])? $_GET['modo']: 'default';

switch ($modo) {

	case 'login':
	
	if(isset($_POST['login'])){
		if(!empty($_POST['user']) and !empty(['pass'])){
			require('includes/clase_Usuario.php');
			$login= new Usuario($_POST['user'],'','','','',$_POST['pass'],'');

			if($login->ingresar()>0){
				session_start();
	        	$_SESSION['user']=$_POST['user'];

                    if (isset($_SESSION['error'])) {
                        if ($_SESSION['error'] == "1") {
                            header('location: formularios/frm_Solicitud_ProyPro.php?modo=Registros');
                        }
                    } else {
                        header('location: formularios/frm_index.php');
                    }
                } else {
                    header('location: formularios/frm_login.php?errores=datos_Incorrectos');
                }
            } else {
                header('location: formularios/frm_login.php?errores=campos_vacios');
            }
        } else {
            header('location: formularios/frm_login.php');
        }
        break;

    case 'registro':
        if (isset($_POST['ingreso'])) {

            if (!empty($_POST['id']) and ! empty(['nombre']) and ! empty($_POST['apellido']) and ! empty(['titulacion']) and ! empty($_POST['email']) and ! empty(['pass']) and ! empty($_POST['rol'])) {

                require('includes/clase_Usuario.php');

                $reg = new Usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['titulacion'], $_POST['email'], $_POST['pass'], $_POST['rol']);

                $valor = $reg->Registro();
                if ($valor == 1) {
                    session_start();
                    $_SESSION['user'] = $_POST['id'];
                    $_SESSION['rol'] = $_POST['rol'];
                    $_SESSION['Nombre_Usuario'] = $_POST['nombre'] . ' ' . $_POST['apellido'];
                    header('location: formularios/frm_index.php');
                } else if ($valor == 2) {
                    header('location: formularios/frm_registro.php?error=Usuario_usado');
                } else if ($valor == 3) {
                    header('location: formularios/frm_registro.php?error=correo_usaaado');
                } else if ($valor == 4) {
                    header('location: formularios/frm_registro.php?error=Usuario_correo_usados');
                }
            } else {
                header('location: formularios/frm_registro.php?error=campos_vacios');
            }
        } else {
            header('location: formularios/frm_registro.php');
        }
        break;


    case 'clave':
        if (isset($_POST['Recuperar'])) {

            if (!empty($_POST['TxtCorreo']) && !empty($_POST['TxtIdentificacion'])) {
                require('includes/clase_Usuario.php');
                $recuperar = new Usuario($_POST['TxtIdentificacion'], '', '', '', $_POST['TxtCorreo'], '', '');
                $valor = $recuperar->recuperar_Clave();                
                if ($valor == 1) {
                    //header('location: formularios/frm_clave.php?SolicitudEnviada');
                    header('location: formularios/frm_index.php');
                } else {
                    header('location: formularios/frm_clave.php?cambioNOExitoso');                   
                }
            } else {
                header('location: formularios/frm_clave.php?error=dato_Vacio');
            }
        } else {
            header('location: formularios/frm_clave.php');
        }

        break;


    default:

        if (isset($_GET['errores']) and $_GET['errores'] == 'campos_vacios') {
            header('location: formularios/frm_login.php?errores=campos_vacios');
        } else if (isset($_GET['errores']) and $_GET['errores'] == 'datos_Incorrectos') {
            header('location: formularios/frm_login.php?errores=datos_Incorrectos');
        } else if (isset($_GET['errores']) and $_GET['errores'] == 'acceso') {
            header('location: formularios/frm_login.php?errores=session_caducada');
        }

        break;
}
?>