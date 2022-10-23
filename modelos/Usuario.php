<?php
/**
 * Description of Usuario
 *
 * @author DANAIS
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoCarrreras/lib/config.php';

class Usuario extends ActiveRecord\Model{
    public static $table_name = "Usuarios";
    // public static $primary_key = "field";
}
