<?php

include("conexion.php");

class evidencia {

    protected $db;
    protected $id_Evidencia;
    protected $Nombre_Evidencia;
    protected $Descripcion_Evidencia;
    protected $Evidencia_Aprendiz;
    protected $FK_id_Componente;
    protected $Fk_Id_Usuario;
    protected $calificacion_Evidencia;

    public function __construct() {

        $this->con = new conexion();
        $this->con->conectar();
    }

    public function Componentes_proyecto($FK_cod_Proyecto) {

        $this->Codigo_Proyecto = $FK_cod_Proyecto;

        $Consulta = mysqli_query($this->con->conectar(),"select * from componentes where FK_cod_Proyecto ='$this->Codigo_Proyecto';");

        if ($this->con->Srows($Consulta) > 0) {
            while ($rrow = $this->con->recorrer($Consulta)) {

                $resultado[$rrow['id_Componente']] = array('id_Componente' => $rrow['id_Componente'], 'nombre_componente' => $rrow['nombre_componente'], 'Descripcion_componente' => $rrow['Descripcion_componente'], 'fecha_Inicio' => $rrow['fecha_Inicio'], 'Fecha_Fin' => $rrow['Fecha_Fin'], 'FK_cod_Proyecto' => $rrow['FK_cod_Proyecto'], 'FK_Id_Usuario' => $rrow['FK_Id_Usuario'], 'Estado' => $rrow['Estado']);
            }
        } else {
            if (mysqli_errno()) {
                session_start();
                $_SESSION['error'] = mysqli_error();
            }
            $resultado = 1;
        }
        return $resultado;
    }

    public function consultar_Calificaciones_Pendientes($id) {
        $this->Fk_Id_Usuario = $id;

        $consulta = mysqli_query( $this->con->conectar(),"select * from evidencias where FK_id_Componente IN (select id_Componente from componentes where FK_cod_Proyecto=(select Codigo_Proyecto from proyectos_productivos where Fk_Id_Usuario='$this->Fk_Id_Usuario')) and Evidencia_Aprendiz = 'Sin registrar';");

        if ($this->con->Srows($consulta) > 0) {

            while ($d = $this->con->recorrer($consulta)) {
                $resultado[$d['id_Evidencia']] = array(
                    'id_Evidencia' => $d['id_Evidencia'],
                    'Nombre_Evidencia' => $d['Nombre_Evidencia'],
                    'Descripcion_Evidencia' => $d['Descripcion_Evidencia'],
                    'Evidencia_Aprendiz' => $d['Evidencia_Aprendiz'],
                    'FK_id_Componente' => $d['FK_id_Componente'],
                    'Fk_Id_usuario' => $d['Fk_Id_usuario'],
                    'calificacion_Evidencia' => $d['calificacion_Evidencia'],
                );
            }
        } else {
            if (mysqli_errno()) {
                $_SESSION['error'] = mysqli_error();
            }
            $resultado = 1;
            //no existe un proyecto registrado
        }
        return $resultado;
    }

    public function consultar_Calificaciones($id) {
        $this->Fk_Id_Usuario = $id;

        $consulta = mysqli_query($this->con->conectar(),"select * from evidencias where FK_id_Componente IN (select id_Componente from componentes where FK_cod_Proyecto=(select Codigo_Proyecto from proyectos_productivos where Fk_Id_Usuario='$this->Fk_Id_Usuario'));");

        if ($this->con->Srows($consulta) > 0) {

            while ($d = $this->con->recorrer($consulta)) {
                $resultado[$d['id_Evidencia']] = array(
                    'id_Evidencia' => $d['id_Evidencia'],
                    'Nombre_Evidencia' => $d['Nombre_Evidencia'],
                    'Descripcion_Evidencia' => $d['Descripcion_Evidencia'],
                    'Evidencia_Aprendiz' => $d['Evidencia_Aprendiz'],
                    'FK_id_Componente' => $d['FK_id_Componente'],
                    'Fk_Id_usuario' => $d['Fk_Id_usuario'],
                    'calificacion_Evidencia' => $d['calificacion_Evidencia'],
                );
            }
        } else {
            if (mysqli_errno()) {
                $_SESSION['error'] = mysqli_error();
            }
            $resultado = 1;
            //no existe un proyecto registrado
        }
        return $resultado;
    }

    public function subir_evidencia($evidencia, $id) {

        $this->Evidencia_Aprendiz = $evidencia;
        $this->id_Evidencia = $id;


        $Consulta = mysqli_query($this->con->conectar(),"update evidencias set Evidencia_Aprendiz='$this->Evidencia_Aprendiz' where id_Evidencia='$this->id_Evidencia';");


//header('location:modo=agregar&error');

        if ($this->con->validarQuery() > 0) {
            $resultado = 1;
        } else {
            if (mysqli_errno()) {
                $_SESSION['error'] = mysqli_error();
            }
            $resultado = 2;
        }
        return $resultado;
    }

}

?> 