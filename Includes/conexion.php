<?php
class conexion
{
    protected $conexion;
    protected $db;

 public function conectar()
    {
        $this->conexion = mysqli_connect('localhost','root', '', 'vtcdm');
        if (!$this->conexion) echo "error en la conexion";// DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysqli_error());
       
        return $this->conexion;

    }

     public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysqli_close($this->conexion);
        }

    }


public function recorrer($y){
	return mysqli_fetch_assoc($y);
}
public function validarQuery(){
    return mysqli_affected_rows($this->conexion );
}


public function Srows($r){
	return  mysqli_num_rows($r );
}

}


?>
