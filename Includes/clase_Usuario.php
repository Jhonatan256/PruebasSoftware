<?php

include("conexion.php");

class Usuario {

    protected $id_Usuario;
    protected $nombre;
    protected $apellido;
    protected $titulacion;
    protected $email;
    protected $contraseña;
    protected $rol;
    protected $con;

    public function __construct($id, $nom, $ape, $titu, $correo, $password, $rol) {
        $this->id_Usuario = $id;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->titulacion = $titu;
        $this->email = $correo;
        $this->contraseña = $password;
        $this->rol = $rol;
        $this->con = new conexion();
        $this->con->conectar();
    }

    public function ingresar() {

        $ingresar = mysqli_query($this->con->conectar(), "Select * from Usuarios where Id_Usuario='$this->id_Usuario' and Pass_Usuario ='$this->contraseña';");

        if ($this->con->Srows($ingresar) > 0) {
            $existe = $this->con->recorrer($ingresar);
            $rol = $existe['Fk_Id_Rol'];
            $nombre = $existe['Nombre_Usuario'];
            $apellido = $existe['Apellido_Usuario'];
            date_default_timezone_set('America/Lima');
            $date = date('Y-m-d H:i:s');
            session_start();
            $_SESSION['rol'] = $rol;
            $_SESSION['Nombre_Usuario'] = $nombre . ' ' . $apellido;
            $_SESSION['date1'] = $date;
            $resultado = 1;
        } else {
            $resultado = 0;
        }
        mysqli_close($this->con->conectar());
        return $resultado;
    }

    public function salir() {
        date_default_timezone_set('America/Lima');
        $date = date('Y-m-d H:i:s');
        $date1 = $_SESSION['date1'];
        $sql = mysqli_query($this->con->conectar(), "Update Usuarios set Logueo_Usuario ='$date1',DesLogueo_Usuario='$date'where Id_Usuario='$this->id_Usuario';");
        if ($this->con->validarQuery() > 0) {
            $resultado = 1;
        } else {
            $resultado = 0;
        }
        return $resultado;
    }

    public function Registro() {

        $ver = mysql_query("select Id_Usuario,Email_Usuario from Usuarios where Id_Usuario='$this->id_Usuario' or Email_Usuario='$this->email';", $this->con->conectar());

        $existe = $this->con->recorrer($ver);

        if ($this->con->Srows($ver) == 0) {

            $ver = mysql_query("insert into Usuarios (Id_Usuario,Nombre_Usuario,Apellido_Usuario,Titulacion_Usuario,Email_Usuario,Pass_Usuario,Fk_Id_Rol) VALUES('$this->id_Usuario','$this->nombre','$this->apellido','$this->titulacion','$this->email','$this->contraseña','$this->rol');");

            if ($this->con->validarQuery() > 0) {
                $resultado = 1;
                date_default_timezone_set('America/Lima');
                $date = date('Y-m-d H:i:s');
                session_start();
                $_SESSION['date1'] = $date;
            } else {
                $resultado = 5;
            }
        } else if (strtolower($existe['Id_Usuario']) == strtolower($this->id_Usuario) and strtolower($existe['Email_Usuario']) != strtolower($this->email)) {
            $resultado = 2; //USUARIO USADO
        } else if (strtolower($existe['Email_Usuario']) == strtolower($this->email) and strtolower($existe['Id_Usuario']) != strtolower($this->id_Usuario)) {
            $resultado = 3; //correo usado
        } else if (strtolower($existe['Id_Usuario']) == strtolower($this->id_Usuario) and strtolower($existe['Email_Usuario']) == strtolower($this->email)) {
            $resultado = 4; //usuario+correo usado
        }

        return $resultado;
    }

    public function recuperar_Clave() {
        $ver = mysqli_query($this->con->conectar(), "select Id_Usuario,Email_Usuario from Usuarios where Id_Usuario='$this->id_Usuario' and Email_Usuario='$this->email';");

        if ($this->con->Srows($ver) == 0) {
            include('includes/Cls_Clave.php');
            $passw = new GenerarPass();
            $password = $passw->NuevaPass(11);

            $url = 'http://' . $_SERVER["SERVER_NAME"] . '/proyecto_final3/formularios/frm_clave.php?user_ID=' . $this->id_Usuario . '&Id_Cambio=' . $password;
            
            mysqli_query($this->con->conectar(), "Update Usuarios set Solicitud_Cambio_Contraseña=1, Id_Cambio_Contraseña ='$password' where  Email_Usuario='$this->email' ;");
            mail($this->email, 'Cambio contraseña VTCDM', "Para confirmar el cambio de contraseña por favor ingrese a la siguiente direccion: <br/><br/> <a href='$url'>url</a>");
            $res = 1;
        } else {
            $res = 2;
        }
        return $res;
    }

    public function traer_usu() {
        $con = new conexion();
        $consulta = $con->query("Select * from Usuarios where Id_Usuario=9 ;");


        if ($con->rows($consulta) > 0) {

            $data = array();
            $data = $con->recorrer($consulta);

            foreach ($data as $fila) {
                $data1 = $fila[0];
            }
        } else {
            header('location: index.php?modo=clave&error=error_de_Consulta');
        }
        return $data1;
    }

}

?>