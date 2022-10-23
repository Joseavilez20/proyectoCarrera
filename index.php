
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/estilos.css"/>
    </head>
    <body>
        <div class="contenedor-login">
            <form id="login" action="controladores/ControlUsuario.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email" id="email"> 
                <label for="pass">Password</label>  
                <input type="password" name="pass" id="pass"> 
                <input type="submit" name="accion" value="LOGIN"> 
            </form>
            <span style="color: red">
                <?php if (isset($_REQUEST["msj"])) {
                    echo $_REQUEST["msj"];
                }
                ?>
            </span>
        </div>
    </body>
</html>


    
 