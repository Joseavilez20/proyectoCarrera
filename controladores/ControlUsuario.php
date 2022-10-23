<?php
session_start();
require_once '../modelos/Usuario.php';

/**
 * Description of ControlUsuario
 *
 * @author DANAIS
 */
class ControlUsuario {
    
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
    
    
    public function iniciar_sesion(){
        $email =  $_POST["email"];
        $pass = $_POST["pass"];

        try {
            $u = Usuario::find_by_email($email);
            if (isset($u)) {
                if( $u->password == $pass) {
                    header("Location: ../web/index.php");
                    exit;
                }else {
                    header("Location: ../index.php?msj=clave incorrecta");
                    exit;
                }
            }else {
                header("Location: ../index.php?msj=No existe este usuario");
                exit;
            }
           
        }
        catch (Exception $ex){
            

        }
    }

    public function guardar(){
        
        $valida = ControlUsuario::validar_datos();
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $genero = $_POST["genero"];
        $rol= $_POST["rol"];

        try {
            $u = new Usuario();
            $u -> cedula = $cedula;
            $u -> nombre = $nombre;
            $u -> email = $email;
            $u -> password = $pass;
            $u -> genero = $genero;
            $u -> rol = $rol;
            $u -> save();

            $total = Usuario::count();
            $msj = "Se registro con exito, total registros ".$total;
            
            header("Location: ../web/usuario/index.php?msj=".$msj);
            exit;

        } catch (Exception $exc) {
            $msj = "No se guardo el registro, error:". $exc->getMessage();
            header("Location: ../web/usuario/agregar.php?msj=".$msj);
            exit;
        }
        
    }

    public static function validar_datos(){
        $cedula= $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $genero = $_POST["genero"];
       
    
        if ($cedula == null || $cedula == "" ){
            header("location: ../web/usuario/agregar.php?msj=El cedula es requerido");
            exit;
        }
        if ($nombre == null || $nombre == "" ){
            header("location: ../web/usuario/agregar.php?msj=El nombre es requerido");
            exit;
        }
        if ($email == null || $email == "" ){
            header("location: ../web/usuario/agregar.php?msj=El email es requerido");
            exit;
        }
        if ($pass == null || $pass == "" ){
            header("location: ../web/usuario/agregar.php?msj=El password es requerido");
            exit;
        }
        if ($genero== null || $genero== "" ){
            header("location: ../web/usuario/agregar.php?msj=El genero es requerido");
            exit;
        }
       
    }

    public static function buscar(){
        try {
            $u = Usuario::find($_REQUEST["id"]);
            $u = serialize($u);
            
            $_SESSION["usuariofind"] = $u;
            header("Location: ../web/usuario/agregar.php?accion=editar");
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
            header("location: ../web/usuario/index.php?msj=La cedula es requerida");
            exit;
        }
        try {
            $u = Usuario::find_by_cedula($cedula);
            if ($u) {
                
                $u = serialize($u);
                
                $_SESSION["usuariofind"] = $u;
                header("Location: ../web/usuario/agregar.php?accion=editar");
                exit;
            }else {
                
                header("Location: ../web/usuario/index.php?msj=No hay registros");
                exit;
            }
            

        }catch (Exception $exc) {
            $msj = "No se elimino el registro, error:". $exc->getMessage();
            var_dump($msj);
            // header("Location: ../web/usuario/agregar.php?msj=".$msj);
            // $_SESSION["usuario.find"] = null;
            exit;
        }
    }
   
    public function actualizar(){
        
        $valida = ControlUsuario::validar_datos();
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $genero = $_POST["genero"];
        $rol= $_POST["rol"];

        try {
            $u = Usuario::find($_POST["id"]);
            $u -> cedula = $cedula;
            $u -> nombre = $nombre;
            $u -> email = $email;
            $u -> password = $pass;
            $u -> genero = $genero;
            $u -> rol = $rol;
            $u -> save();
            // var_dump($u);
           
            $msj = "Actualización exitosa";
            
            header("Location: ../web/usuario/agregar.php?msj=".$msj);
            exit;

        } catch (Exception $exc) {
            $msj = "No se guardo el registro, error:". $exc->getMessage();
            header("Location: ../web/usuario/agregar.php?msj=".$msj);
            exit;
        }
        
    }
    public static function eliminar(){
        try {
            $u = Usuario::find($_REQUEST["id"]);
            $u->delete();
            $msj = "Registro eliminado";
            
            header("Location: ../web/usuario/index.php?msj=".$msj);
            exit;

        }catch (Exception $exc) {
            $msj = "No se elimino el registro, error:". $exc->getMessage();
            header("Location: ../web/usuario/index.php?msj=".$msj);
            exit;
        }
        
         
    }
}

$accion = $_REQUEST["accion"];
if ($accion != null) {
    $controlador = new ControlUsuario();
    $controlador->ejecutar_accion($accion);
}
