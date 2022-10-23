<?php
/**
 * Description of Carrera
 *
 * @author DANAIS
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoCarrreras/lib/config.php';

class Carrera extends ActiveRecord\Model{
    public static $table_name = "carreras";
    public static $primary_key = "cedula";
}
