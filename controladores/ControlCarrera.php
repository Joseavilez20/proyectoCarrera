<?php
session_start();
require_once '../modelos/Carrera.php';

/**
 * Description of ControlCarrera
 *
 * @author DANAIS
 */
class ControlCarrera {
    
    public function ejecutar_accion($accion){
        switch ($accion){
            case "LOGIN":
                $this -> iniciar_sesion();
                break;
            case "GUARDAR":
                $this -> guardar();
                break;
            case "ELIMINAR":
                $this -> eliminar();
                break;
            case "EDITAR":
                $this -> buscar();
                break;
            case "BUSCAR":
                $this -> buscar_cedula();
                break;
            case "ACTUALIZAR":
                $this -> actualizar();
                break;
            default: 
                break;
        }
    }
    
    


    public function guardar(){
        
        $valida = ControlCarrera::validar_datos();
        $cedula = $_POST["cedula"];
        $pass = $_POST["password"];
        $nombre = $_POST["nombre"];
        $num_Creditos = $_POST["num_Creditos"];
        $num_Asignaturas = $_POST["num_Asignaturas"];
        $num_Semestres = $_POST["num_Semestres"];
        $nivel_formacion = $_POST["nivel_formacion"];
        $titulo = $_POST["titulo"];
        $valor_semestre = $_POST["valor_Semestre"];
        $universidad = $_POST["universidad"];
        $es_Acreditada = $_POST["es_Acreditada"];
        $perfiles = $_POST["perfiles"];
        $area_Conocimiento = $_POST["area_Conocimiento"];
       

        try {
            $c = new Carrera();
            $c -> cedula = $cedula;
            $c -> password = $pass;
            $c -> nombre = $nombre;
            $c -> num_creditos = $num_Creditos;
            $c -> num_asignaturas = $num_Asignaturas;
            $c -> num_semestres = $num_Semestres;
            $c -> nivel_formacion = $nivel_formacion;
            $c -> titulo = $titulo;
            $c -> valor_semestre = $valor_semestre;
            $c -> universidad = $universidad;
            $c -> es_acreditada = $es_Acreditada;
            $c -> perfiles = $perfiles;
            $c -> area_conocimiento = $area_Conocimiento;

            
            $c -> save();

            $total = Carrera::count();
            $msj = "Se registro con exito, total registros ".$total;
            
            header("Location: ../web/carrera/index.php?msj=".$msj);
            exit;

        } catch (Exception $exc) {
            $msj = "No se guardo el registro, error:". $exc->getMessage();
            header("Location: ../web/carrera/agregar.php?msj=".$msj);
            exit;
        }
        
    }

    public static function validar_datos(){
        $cedula = $_POST["cedula"];
        $pass = $_POST["password"];
        $nombre = $_POST["nombre"];
        $num_Creditos = $_POST["num_Creditos"];
        $num_Asignaturas = $_POST["num_Asignaturas"];
        $num_Semestres = $_POST["num_Semestres"];
        $nivel_formacion = $_POST["nivel_formacion"];
        $titulo = $_POST["titulo"];
        $valor_semestre = $_POST["valor_Semestre"];
        $universidad = $_POST["universidad"];
        $es_Acreditada = $_POST["es_Acreditada"];
        $perfiles = $_POST["perfiles"];
        $area_Conocimiento = $_POST["area_Conocimiento"];
       
    
        if ($cedula == null || $cedula == "" ){
            header("location: ../web/carrera/agregar.php?msj=El cedula es requerido");
            exit;
        }
        if ($pass== null || $pass == "" ){
            header("location: ../web/carrera/agregar.php?msj=El password es requerido");
            exit;
        }
        if ($nombre == null || $nombre == "" ){
            header("location: ../web/carrera/agregar.php?msj=El nombre es requerido");
            exit;
        }
        if ($num_Creditos== null || $num_Creditos== "" ){
            header("location: ../web/carrera/agregar.php?msj=El número de creditos es requerido");
            exit;
        }
        if ($num_Asignaturas== null || $num_Asignaturas== "" ){
            header("location: ../web/carrera/agregar.php?msj=El número de asignaturas es requerido");
            exit;
        }
        
        if ($num_Semestres== null || $num_Semestres== "" ){
            header("location: ../web/carrera/agregar.php?msj=El número de semestres es requerido");
            exit;
        }
        if ($nivel_formacion== null || $nivel_formacion== "" ){
            header("location: ../web/carrera/agregar.php?msj=El nivel de formación es requerido");
            exit;
        }
        if ($titulo== null || $titulo== "" ){
            header("location: ../web/carrera/agregar.php?msj=El titulo es requerido");
            exit;
        }
        if ($valor_semestre== null || $valor_semestre== "" ){
            header("location: ../web/carrera/agregar.php?msj=El valor del semestre es requerido");
            exit;
        }

        if ($universidad== null || $universidad== "" ){
            header("location: ../web/carrera/agregar.php?msj=La universidad es requerida");
            exit;
        }
        if ($es_Acreditada== null || $es_Acreditada== "" ){
            header("location: ../web/carrera/agregar.php?msj=Marque si es acreditada o no");
            exit;
        }
        if ($perfiles== null || $perfiles== "" ){
            header("location: ../web/carrera/agregar.php?msj=El perfil es requerido");
            exit;
        }
        if ($area_Conocimiento== null || $area_Conocimiento== "" ){
            header("location: ../web/carrera/agregar.php?msj=El area de conocimiento es requerido");
            exit;
        }
       
    }

    public static function buscar(){
        try {
            $u = Carrera::find($_REQUEST["id"]);
            $u = serialize($u);
            
            $_SESSION["carrerafind"] = $u;
            header("Location: ../web/carrera/agregar.php?accion=editar");
            exit;
            

        }catch (Exception $exc) {
            $msj = "No se elimino el registro, error:". $exc->getMessage();
            var_dump($msj);
            // header("Location: ../web/usuario/agregar.php?msj=".$msj);
            // $_SESSION["usuario.find"] = null;
            exit;
        }
    }
    public static function buscar_cedula(){
        $cedula = $_REQUEST["cedula"];
        if ($cedula == null || $cedula == "" ){
            header("location: ../web/carrera/index.php?msj=La cedula es requerido");
            exit;
        }
        try {
            $u = Carrera::find_by_cedula($cedula);
            if ($u) {
                $u = serialize($u);
            
                $_SESSION["carrerafind"] = $u;
                header("Location: ../web/carrera/agregar.php?accion=editar");
                exit;
            }else {
               
                header("Location: ../web/carrera/index.php?msj=No hay registros");
                exit;
            }
            
            

        }catch (Exception $exc) {
            $msj = "No se elimino el registro, error:". $exc->getMessage();
            
            header("Location: ../web/carrera/index.php?msj=".$msj);
            $_SESSION["carrerafind"] = null;
            exit;
        }
    }
   
    public function actualizar(){
        
        $valida = ControlCarrera::validar_datos();
        $cedula = $_POST["cedula"];
        $pass = $_POST["password"];
        $nombre = $_POST["nombre"];
        $num_Creditos = $_POST["num_Creditos"];
        $num_Asignaturas = $_POST["num_Asignaturas"];
        $num_Semestres = $_POST["num_Semestres"];
        $nivel_formacion = $_POST["nivel_formacion"];
        $titulo = $_POST["titulo"];
        $valor_semestre = $_POST["valor_semestre"];
        $universidad = $_POST["universidad"];
        $es_Acreditada = $_POST["es_Acreditada"];
        $perfiles = $_POST["perfiles"];
        $area_Conocimiento = $_POST["area_Conocimiento"];

        try {
            $c = Carrera::find($_POST["id"]);
            $c -> cedula = $cedula;
            $c -> password = $pass;
            $c -> nombre = $nombre;
            $c -> num_creditos = $num_Creditos;
            $c -> num_asignaturas = $num_Asignaturas;
            $c -> num_semestres = $num_Semestres;
            $c -> nivel_formacion = $nivel_formacion;
            $c -> titulo = $titulo;
            $c -> valor_semestre = $valor_semestre;
            $c -> universidad = $universidad;
            $c -> es_acreditada = $es_Acreditada;
            $c -> perfiles = $perfiles;
            $c -> area_conocimiento = $area_Conocimiento;
            $c -> save();
          
           
            $msj = "Actualización exitosa";
            
            header("Location: ../web/carrera/agregar.php?msj=".$msj);
            exit;

        } catch (Exception $exc) {
            $msj = "No se guardo el registro, error:". $exc->getMessage();
            header("Location: ../web/carrera/agregar.php?msj=".$msj);
            exit;
        }
        
    }
    public static function eliminar(){
        try {
            $u = Carrera::find($_REQUEST["id"]);
            $u->delete();
            $msj = "Registro eliminado";
            
            header("Location: ../web/carrera/index.php?msj=".$msj);
            exit;

        }catch (Exception $exc) {
            $msj = "No se elimino el registro, error:". $exc->getMessage();
            header("Location: ../web/carrera/index.php?msj=".$msj);
            exit;
        }
        
         
    }
}

$accion = $_REQUEST["accion"];
if ($accion != null) {
    $controlador = new ControlCarrera();
    $controlador->ejecutar_accion($accion);
}
