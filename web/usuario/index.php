<?php 
    require_once '../../modelos/Usuario.php';
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
                        <a href="usuario/index.php" target="target">Usuarios</a>
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
                <ul>
                    <li>
                        <a href="agregar.php" >Agregar</a>
                    </li>
                    <li>
                        <form action="../../controladores/ControlUsuario.php">
                            Cedula <input type="text" name="cedula">
                             <input type="submit" name="accion" value="BUSCAR">
                        </form>
                        
                    </li>
                    
                </ul>
                <table border="1" >
                    <thead>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Genero</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                        
                    </thead>
                    <tbody>
                        <?php 
                            $listado = Usuario::all();
                            foreach ($listado as $key => $value) {

                                
                                echo '<tr>
                                        <td>'.$value -> cedula.'</td>
                                        <td>'.$value -> nombre.'</td>
                                        <td>'.$value->email.'</td>
                                        <td>'.$value -> password.'</td>
                                        <td>'.$value -> genero.'</td>
                                        <td>'.$value -> rol.'</td>
                                        <td> 
                                            <a href="../../controladores/ControlUsuario.php?accion=EDITAR&id='.$value->id.'" >Editar</a>
                                            <a href="../../controladores/ControlUsuario.php?accion=ELIMINAR&id='.$value->id.'" >Eliminar</a>
                                        </td>
                                    </tr>';
                            }
                         ?>
                        
                    </tbody>
                    
                </table>
                <span style="color:red">
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

        
