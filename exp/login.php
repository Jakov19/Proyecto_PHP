<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Experiencias La Salle</title>
    <link rel='stylesheet' href='stilo_tabla.css' >
</head>
    
<body>
    <h1>Por favor accede para continuar...</h1>

<?php

    include("dbconn.php");

    // Recoger los datos del login //
    if(!isset($_POST['user'])&&($_POST['pass'])){

        echo "El usuario o la contraseña están vacios";
        } else {
            $myUser=$_POST['user'];
            $myPass=$_POST['pass'];
            
            echo $myPass.$myUser;

            login($myUser,$myPass);  
    };
    
    function login($user,$pass){
        $pass= md5($pass);
        echo $pass;
        $conn = openConn("lasalledb");
        $sql = "SELECT * FROM usuarios WHERE rol='".$user."';";   
        $result=$conn->query($sql);
        
        if($result->num_rows>0){
                    
            while($row=$result->fetch_assoc()){
                    $rol=$row["rol"];
                    $passwd=$row["password"];
                    
                    echo $rol;
                    echo $passwd;
                    if ($rol===$user && $passwd===$pass) {
                        
                        // Se redirige a la página index.php //
                        header("Location:index.php");
 
                    } else {
                    echo "El usuario o la contraseña no son correctos";
                }
             }
        }
        
        closeConn($conn);
    };
?>

<p>&nbsp;</p>
<div id='container'>
    <form name='update' method='post'>
        <table width='25%' align='center'>
            <tr>
                <td>Nombre de usuario</td>
                <td><label for='user'></label>
                    <input type='text' name='user' id='user' value="" /></td>
            </tr>
            <tr>
                <td>Contraseña de usuario</td>
                <td><label for='pass'></label>
                    <input type='text' name='pass' id='pass' value="" /></td>
            </tr>
            <tr>
                <td><input  type='submit' name='login' id='login' value='Login' /></td>
            </tr>
        </table>
    </form>
</div>
</html>