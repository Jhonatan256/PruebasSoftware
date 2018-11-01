<?php
include("conexion.php");
class aprendiz{

	protected $Id_Segundo_integrante; 
	protected $Tema_Proyecto;
	protected $Carta_Aprobado;
	protected $Estado_Solicitud;
	protected $Id_Usuario;
	protected $con;
	protected $nombre_Proyecto;
	protected $fc_inicio;
	protected $fc_fin;
	protected $FK_Codigo_Solicitud_Proyecto;
	protected $nombre_componente;
	protected $Descripcion_componente;

	public function __construct(){
	 $this->con=new conexion();
     $this->con->conectar();
	}

	public function traer_evidencias	(){

      $ingresar=mysql_query("Select * from solicitud_proyecto where Fk_Id_Usuario='$this->Id_Usuario';",$this->con->conectar());  

		if($this->con->Srows($ingresar)>0){ 
			$existe=$this->con->recorrer($ingresar);
			$resultado=$existe;

			}else{
				$resultado=1;//no existe un proyecto registrado
			}
			return $resultado;
	}


}