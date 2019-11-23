<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Experiencias La Salle</title>
        
    </head>
    <body>
        
    <?php
        $estado=session_status();
        session_destroy();
        echo $estado;
        session_start();
        
        echo $estado;
        
        echo $estado;
        if ($estado==2){
        
            //echo "Bienvenido".$_SESSION['user']."<br><br>";
            
            
            echo "<form name='filtro_actividad' action='read.php' method='get'>
            <p>Indique el tipo de actividad a buscar</p>
             
            <input type='text' name='search' />
            <input type='submit' value='Buscar' name='Buscar' />
        </form>";
            echo $estado;
            die();
        }elseif ($estado==1) {
            //header("Location:login.php");
        }
    ?>

    </body>
</html>
