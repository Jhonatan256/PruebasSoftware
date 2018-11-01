<?php
class GenerarPass {
	private $cadena;
	private $longitud;
	private $passw;
	public function __construct(){
            
           
		$this->cadena='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$this->passw='';
	}
	public function NuevaPass($long){
            
		$lng_cadena=strlen($this->cadena);//cuenta los caracteres
		$this->longitud=$long;
		for($x=1;$x<=$this->longitud;$x++){
			$aleatorio=mt_rand(0,$lng_cadena-1);//escoje un numero aleatorio
			$this->passw .= substr($this->cadena,$aleatorio,1);//escoja el caracter dependiendo de la posicion de la cadena
		}
		return $this->passw;
	}
}
?>