<?php 
session_start();
require_once '../../modelos/Carrera.php';
$c = null;
if (isset($_GET["accion"])) {
    $c = $_SESSION["carrerafind"];
    $c = unserialize($c);  
}
 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <nav>
                <ul>
                    <li>
                        <a href="../usuario/index.php" target="target">Usuarios</a>
                    </li>
                    <li> 
                        <a href="index.php" target="target">Carreras</a>
                    </li>
                    <li> 
                        <a href="../../index.php" target="target">Salir</a>
                    </li>
                </ul>

            </nav>
            <main>
                <h1>Carreras</h1>
               
                
                <form id="agregar" action="../../controladores/ControlCarrera.php" method="post">
                     <label for="cedula">cedula</label>
                    <input type="text" name="cedula" id="cedula" value="<?= ($c) ?  $c->cedula : "" ?>">
                    
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?= ($c) ?  $c->password : "" ?>">
                   
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= ($c) ?  $c->nombre : "" ?>">
                    
                    <label for="num_Creditos">num_Creditos</label>
                    <input type="text" name="num_Creditos" id="num_Creditos" value="<?= ($c) ?  $c->num_creditos : "" ?>">
                   
                    <label for="num_Asignaturas">num_Asignaturas</label>
                    <input type="text" name="num_Asignaturas" id="num_Asignaturas" value="<?= ($c) ?  $c->num_asignaturas : "" ?>">
                   
                    <label for="num_Semestres">num_Semestres</label>
                    <input type="text" name="num_Semestres" id="num_Semestres" value="<?= ($c) ?  $c->num_semestres : "" ?>">
                   
                    <label for="nivel_formacion">nivel_formacion</label>
                    <input type="text" name="nivel_formacion" id="nivel_formacion" value="<?= ($c) ?  $c->nivel_formacion : "" ?>">
                   
                    <label for="titulo">titulo</label>
                    <input type="text" name="titulo" id="titulo" value="<?= ($c) ?  $c->titulo : "" ?>">
                   
                    <label for="valor_Semestre">valor_Semestre</label>
                    <input type="number" name="valor_Semestre" id="valor_Semestre" value="<?= ($c) ?  $c->valor_semestre : "" ?>">
                   
                    <label for="universidad">universidad</label>
                    <input type="text" name="universidad" id="universidad" value="<?= ($c) ?  $c->universidad : "" ?>">
                   
                    
                    <select name="es_Acreditada" id="es_Acreditada">
                        <option value="<?= ($c) ?  $c->es_acreditada : "" ?>"><?= ($c) ?  $c-> es_acreditada : "Seleccione si es Acreditada" ?></option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                   
                    <label for="perfiles">perfiles</label>
                    <input type="text" name="perfiles" id="perfiles" value="<?= ($c) ?  $c->perfiles : "" ?>">
                   
                    <label for="area_Conocimiento">area_Conocimiento</label>
                    <input type="text" name="area_Conocimiento" id="area_Conocimiento" value="<?= ($c) ?  $c->area_conocimiento : "" ?>">
                   
                    
                    
                    <?php 
                     if ($c) {
                        echo '<input type="hidden" name="id" value="'.$c -> id.'">';
                     }
                        
                    ?>
                    <input type="submit" name="accion" value="<?= ($c) ?  "ACTUALIZAR" : "GUARDAR" ?>">
                </form>
                <span style="color: red">
                  <?php 
                    if(isset($_REQUEST["msj"])){
                        echo $_REQUEST["msj"];
                    }

                  ?>  
                  </span>
                
            </main>
        </div>
    </body>
</html>

        
