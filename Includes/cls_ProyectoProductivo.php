<?php
include("conexion.php");
class ProyectosProductivos{

	protected $idtabla; 
	protected $Tema_Proyecto;
	protected $Carta_Aprobado;
	protected $Estado_Solicitud;
	protected $Id_Usuario;
	protected $con;
	protected $nombre_Proyecto;
	protected $fc_inicio;
	protected $fc_fin;
	protected $Codigo_Proyecto;
	protected $nombre_componente;
	protected $Descripcion_componente;

	public function __construct(){
	//$this->Id_Usuario=$id;
	//$this->Tema_Proyecto=$tema;
	//$this->Carta_Aprobado=$carta;
	//$this->Estado_Solicitud=$estado;
	//$this->nombre_Proyecto=$nom_Proyecto;
	//$this->fc_inicio=$fc_i;
	//$this->fc_fin=$fc_f;
	//$this->Codigo_Proyecto=$fk_codigo_Soli;
	//$this->nombre_componente=$nom_componente;
	//$this->Descripcion_componente=$Des_componente;
	 $this->con=new conexion();
     $this->con->conectar();
	}
	public function Validar($id){

	$this->Id_Usuario=$id;
    
    $ingresar=mysqli_query($this->con->conectar(),"Select * from proyectos_productivos where FK_Id_Usuario='$this->Id_Usuario';");  

		if($this->con->Srows($ingresar)>0){ 
			while($rrow = $this->con->recorrer($ingresar	)) { 

   	 $resultado[$rrow['Codigo_Proyecto']]=array('Codigo_Proyecto' =>$rrow['Codigo_Proyecto'], 'Tema_Proyecto'=>$rrow['Tema_Proyecto'], 'nombre_Proyecto'=>$rrow['nombre_Proyecto'],'Carta_Aprobado'=>$rrow['Carta_Aprobado'], 'Fecha_Inicio'=>$rrow['Fecha_Inicio'], 'Fecha_Fin'=>$rrow['Fecha_Fin'],'FK_Id_Usuario'=>$rrow['FK_Id_Usuario'], 'Estado'=>$rrow['Estado']);	
		} 

		}else{
			if(mysqli_errno()){		
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=1;
				//no existe un proyecto registrado
		}
			return $resultado;
	}

	public function registro_Proyecto($id,$tema,$nom_Proyecto,$carta,$estado){

	$this->Id_Usuario=$id;
	$this->Tema_Proyecto=$tema;
	$this->Carta_Aprobado=$carta;
	$this->Estado_Solicitud=$estado;
	$this->nombre_Proyecto=$nom_Proyecto;
	date_default_timezone_set('America/Lima'); 
    $date = date('Y-m-d H:i:s');
	$this->fc_inicio=$date;
	$this->fc_fin="indefinido";


	$consulta=mysqli_query($this->con->conectar(),"insert into proyectos_productivos (Codigo_Proyecto,Tema_Proyecto,nombre_Proyecto,Carta_Aprobado,Fecha_Inicio,Fecha_Fin,Estado,Fk_Id_usuario) values ('',
		'$this->Tema_Proyecto','$this->nombre_Proyecto','$this->Carta_Aprobado','$this->fc_inicio','$this->fc_fin','$this->Estado_Solicitud','$this->Id_Usuario');" );
	
	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){		
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=1;
	
	} 
	return $resultado;        

	}

	public function Estado_proyecto($estado){
	
	$this->Estado_Solicitud=$estado;

	$Consulta=mysqli_query($this->con->conectar(),"select * from proyectos_productivos where Estado ='$this->Estado_Solicitud';");

	if($this->con->Srows($Consulta)>0){ 
		while($rrow = $this->con->recorrer($Consulta)) { 

   	 $resultado[$rrow['Codigo_Proyecto']]=array('Codigo_Proyecto' =>$rrow['Codigo_Proyecto'], 'Tema_Proyecto'=>$rrow['Tema_Proyecto'], 'nombre_Proyecto'=>$rrow['nombre_Proyecto'],'Carta_Aprobado'=>$rrow['Carta_Aprobado'], 'Fecha_Inicio'=>$rrow['Fecha_Inicio'], 'Fecha_Fin'=>$rrow['Fecha_Fin'],'FK_Id_Usuario'=>$rrow['FK_Id_Usuario'], 'Estado'=>$rrow['Estado']);	
		} 
	}else{ 
		if(mysqli_errno()){		
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=1;
	
	} 
		return $resultado;
	}

	public function validar_aprobado_Proyecto($id_pro){
		$Consulta=mysqli_query($this->con->conectar(),"select *  from componentes WHERE Estado <> 'aprobar' and FK_cod_Proyecto='$this->Codigo_Proyecto';");
	if($this->con->Srows($Consulta)>0){
	 	$resultado=1;
	 	$_SESSION['error']="";
	}else{ 
		if(mysqli_errno()){		
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2;
	
	} 
		return $resultado;
	}


	public function Cambiar_Estado_Solicitud_proyecto($fk_codigoPro,$estado,$Fecha_Fin){

		$this->Codigo_Proyecto=$fk_codigoPro;
		$this->Estado_Solicitud=$estado;
		if($Fecha_Fin="definido"){
			date_default_timezone_set('America/Lima'); 
	    	$date = date('Y-m-d H:i:s');    	
			$this->fc_fin=$date;
		}else{
			$this->fc_fin=$Fecha_Fin;
		}
		$_SESSION['error']=$this->Estado_Solicitud;
		$Consulta=mysqli_query($this->con->conectar(),"update proyectos_productivos set  Estado ='$this->Estado_Solicitud' , Fecha_Fin='$this->fc_fin' WHERE Codigo_Proyecto='$this->Codigo_Proyecto';");
		
	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
			if(mysql_errno()){		
			$_SESSION['error']=mysqli_error();	
			}
		$resultado=2;
	}
		return $resultado;
	}




	public function Registrar_Componentes($id,$cod_pro,$nom_componente,$Des_componente){
	
		$this->Id_Usuario=$id;
		$this->Codigo_Proyecto=$cod_pro;
		$this->nombre_componente=$nom_componente;
		$this->Descripcion_componente=$Des_componente;
		date_default_timezone_set('America/Lima'); 
    	$date = date('Y-m-d H:i:s');
		$this->fc_inicio=$date;
		$this->fc_fin="indefinido";
		$this->Estado_Solicitud="Pendiente";

	$consulta=mysqli_query($this->con->conectar(),"insert into componentes (id_Componente, nombre_componente, Descripcion_componente, fecha_Inicio, fecha_Fin, Estado, FK_cod_Proyecto, Fk_Id_usuario) VALUES
		 ('','$this->nombre_componente','$this->Descripcion_componente','$this->fc_inicio','$this->fc_fin','$this->Estado_Solicitud','$this->Codigo_Proyecto','$this->Id_Usuario');");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

	public function Actualizar_Componentes($id,$cod_pro,$nom_componente,$Des_componente,$estado,$cod_componentes){
		
		$this->Id_Usuario=$id;
		$this->Codigo_Proyecto=$cod_pro;
		$this->nombre_componente=$nom_componente;
		$this->Descripcion_componente=$Des_componente;
		date_default_timezone_set('America/Lima'); 
    	$date = date('Y-m-d H:i:s');
		$this->fc_inicio=$date;
		$this->fc_fin="indefinido";
		$this->Estado_Solicitud=$estado;
		$this->idtabla=$cod_componentes;	

	$consulta=mysql_query($this->con->conectar(),"update componentes set nombre_componente = '$this->nombre_componente', Descripcion_componente='$this->Descripcion_componente', fecha_Fin ='$this->fc_fin', Estado = '$this->Estado_Solicitud', Fk_Id_usuario='$this->Id_Usuario' where  id_Componente ='$this->idtabla';");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

	public function Eliminar_Componentes($cod_pro){
	
	$this->idtabla=$cod_pro;
	$consulta=mysqli_query($this->con->conectar(),"delete from  componentes where id_Componente ='$this->idtabla';");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysql_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

	public function Componentes_proyecto($FK_cod_Proyecto){

	$this->Codigo_Proyecto=$FK_cod_Proyecto;

	$Consulta=mysqli_query($this->con->conectar(),"select * from componentes where FK_cod_Proyecto ='$this->Codigo_Proyecto';");

	if($this->con->Srows($Consulta)>0){ 
		while($rrow = $this->con->recorrer($Consulta)) { 

   	 $resultado[$rrow['id_Componente']]=array('id_Componente' =>$rrow['id_Componente'], 'nombre_componente'=>$rrow['nombre_componente'], 'Descripcion_componente'=>$rrow['Descripcion_componente'],'fecha_Inicio'=>$rrow['fecha_Inicio'], 'fecha_Fin'=>$rrow['fecha_Fin'], 'FK_cod_Proyecto'=>$rrow['FK_cod_Proyecto'],'Fk_Id_usuario'=>$rrow['Fk_Id_usuario'], 'Estado'=>$rrow['Estado']);	
		} 
	}else{ 
		if(mysqli_errno()){		
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=1;
	
	} 
		return $resultado;
	}


	public function Evidencias_proyecto($FK_cod_Proyecto){

	$this->Codigo_Proyecto=$FK_cod_Proyecto;

		$Consulta=mysqli_query("select * from evidencias where FK_id_Componente in (select id_Componente from componentes where FK_cod_Proyecto='$this->Codigo_Proyecto');",$this->con->conectar());

	if($this->con->Srows($Consulta)>0){ 
		while($rrow = $this->con->recorrer($Consulta)) { 

   	 $resultado[$rrow['id_Evidencia']]=array('id_Evidencia' =>$rrow['id_Evidencia'], 'Nombre_Evidencia'=>$rrow['Nombre_Evidencia'], 'Descripcion_Evidencia'=>$rrow['Descripcion_Evidencia'],'Evidencia_Aprendiz'=>$rrow['Evidencia_Aprendiz'], 'FK_id_Componente'=>$rrow['FK_id_Componente'], 'Fk_Id_usuario'=>$rrow['Fk_Id_usuario'],'calificacion_Evidencia'=>$rrow['calificacion_Evidencia']);	
		} 
	}else{ 
		if(mysqli_errno()){		
			session_start();
			$_SESSION['error']=mysqli_error();			
		}
		$resultado=1;
	} 
		return $resultado;
	}

	public function validar_aprobado($FK_cod_Proyecto){

	$this->Codigo_Proyecto=$FK_cod_Proyecto;
	$Consulta=mysqli_query($this->con->conectar(),"select * from evidencias where FK_id_Componente ='$this->Codigo_Proyecto'  and calificacion_Evidencia <> 'A' ;");
	

	if($this->con->Srows($Consulta)>0){ 
		$resultado=1;
		$_SESSION['error']="INGRESO";//hay evidencias pendientes
	}else{ 
		if(mysqli_errno()){		
			session_start();
			$_SESSION['error']=mysqli_error();			
		}
		$resultado=2;//todo ok
	} 
		return $resultado;
	}

	public function Registrar_Evidencias($id,$nom_evidencia,$Des_evidencia,$cod_componentes){
	
		$this->Id_Usuario=$id;
		$this->Codigo_Proyecto=$cod_componentes;
		$this->nombre_componente=$nom_evidencia;
		$this->Descripcion_componente=$Des_evidencia;

	$consulta=mysqli_query($this->con->conectar(),"insert into evidencias (id_Evidencia, Nombre_Evidencia, Descripcion_Evidencia, Evidencia_Aprendiz, FK_id_Componente, Fk_Id_usuario, calificacion_Evidencia) VALUES
		 ('','$this->nombre_componente','$this->Descripcion_componente','Sin registrar','$this->Codigo_Proyecto','$this->Id_Usuario','Por Evaluar');");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

		public function Actualizar_Evidencias($id,$nom_componente,$Des_componente,$estado,$cod_componentes){		
		
		$this->nombre_componente=$nom_componente;
		$this->Descripcion_componente=$Des_componente;
		$this->Estado_Solicitud=$estado;
		$this->idtabla=$cod_componentes;
		$this->Id_Usuario=$id;	

	$consulta=mysqli_query($this->con->conectar(),"update evidencias set Nombre_Evidencia = '$this->nombre_componente', Descripcion_Evidencia='$this->Descripcion_componente',	calificacion_Evidencia = '$this->Estado_Solicitud', Fk_Id_usuario='$this->Id_Usuario' where  id_Evidencia ='$this->idtabla';");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

	public function Eliminar_Evidencias($id_Evidencia){
	
	$this->idtabla=$id_Evidencia;
	$consulta=mysqli_query($this->con->conectar(),"delete from  evidencias where id_Evidencia ='$this->idtabla';");

	if($this->con->validarQuery()>0){
		$resultado=1;   	
	}else{ 
		if(mysqli_errno()){
			session_start();
			$_SESSION['error']=mysqli_error();	
		}
		$resultado=2; 
	} 
	return $resultado;       
	}

	

}

?>