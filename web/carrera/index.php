<?php 
    require_once '../../modelos/Carrera.php';
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
                <ul>
                    <li>
                        <a href="agregar.php" >Agregar</a>
                    </li>
                    <li>
                    <form action="../../controladores/ControlCarrera.php">
                            Cedula <input type="text" name="cedula">
                             <input type="submit" name="accion" value="BUSCAR">
                        </form>
                    </li>
                    
                </ul>
                <table border="1" >
                    <thead>
                        <th>Cedula</th>
                        <th>Password</th>
                        <th>Nombre</th>
                        <th>NumCreditos</th>
                        <th>NumAsignaturas</th>
                        <th>NumSemestres</th>
                        <th>Nivel Formación</th>
                        <th>Titulo</th>
                        <th>Valor Semestre</th>
                        <th>Universidad</th>
                        <th>Es Acreditada</th>
                        <th>Perfiles</th>
                        <th>Area De conocimiento</th>
                        <th>Acciones</th>
                        
                    </thead>
                    <tbody>
                        <?php 
                            $listado = Carrera::all();
                            foreach ($listado as $key => $value) {

                                
                                echo '<tr>
                                       
                                        <td>'.$value->cedula.'</td>
                                        <td>'.$value -> password.'</td>
                                        <td>'.$value -> nombre.'</td>
                                        <td>'.$value -> num_creditos.'</td>
                                        <td>'.$value -> num_asignaturas.'</td>
                                        <td>'.$value -> num_semestres.'</td>
                                        <td>'.$value -> nivel_formacion.'</td>
                                        <td>'.$value -> titulo.'</td>
                                        <td>'.$value -> valor_semestre.'</td>
                                        <td>'.$value -> universidad.'</td>
                                        <td>'.$value -> es_acreditada.'</td>
                                        <td>'.$value -> perfiles.'</td>
                                        <td>'.$value -> area_conocimiento.'</td>
                                        
                                        <td> 
                                            <a href="../../controladores/ControlCarrera.php?accion=EDITAR&id='.$value->id.'" >Editar</a>
                                            <a href="../../controladores/ControlCarrera.php?accion=ELIMINAR&id='.$value->id.'" >Eliminar</a>
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

        
