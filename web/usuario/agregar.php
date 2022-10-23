<?php 
session_start();
require_once '../../modelos/Usuario.php';
$u = null;
if (isset($_GET["accion"])) {
    $u = $_SESSION["usuariofind"];
    $u = unserialize($u);  
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
                        <a href="index.php" target="target">Usuarios</a>
                    </li>
                    <li> 
                        <a href="../carrera/index.php" target="target">Carreras</a>
                    </li>
                    <li> 
                        <a href="../../index.php" target="target">Salir</a>
                    </li>
                </ul>

            </nav>
            <main>
                <h1>Usuarios</h1>
               
                
                <form id="agregar" action="../../controladores/ControlUsuario.php" method="post">
                    <label for="cedula">cedula</label>
                    <input type="text" name="cedula" id="cedula" value="<?= ($u) ?  $u->cedula : "" ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= ($u) ?  $u->nombre : "" ?>">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?= ($u) ?  $u->email : "" ?>">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?= ($u) ?  $u->password : "" ?>">
                   
                    <select name="genero" id="genero">
                        <option value="<?= ($u) ?  $u->genero : "" ?>"><?= ($u) ?  $u->genero : "Seleccione el genero" ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <select name="rol" id="rol">
                    <option value="<?= ($u) ?  $u->rol : "" ?>"><?= ($u) ?  $u->rol : "Seleccione un rol" ?></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                    <?php 
                     if ($u) {
                        echo '<input type="hidden" name="id" value="'.$u -> id.'">';
                     }
                        
                    ?>
                    <input type="submit" name="accion" value="<?= ($u) ?  "ACTUALIZAR" : "GUARDAR" ?>">
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

        
