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
    <h1>Actualizar los datos de la fila</h1>

<?php
    include("dbconn.php");

    // Recoger los datos para actualizar //
    if(!isset($_POST['up_bot'])){
        $myId=$_GET['id'];
        $myName=$_GET['name'];
        $myType=$_GET['type'];
        $myDes=$_GET['des'];
        
    }else{
        $myId=$_POST['id'];
        $myName=$_POST['name'];
        $myType=$_POST['type'];
        $myDes=$_POST['des'];
                       
        actualizar($myName,$myType,$myDes,$myId);
               
        // Refescar la pagina read.php //
        header("Location:read.php?count=1");
    };
                            
    function actualizar($name,$type,$des,$id){
        $conn = openConn("lasalledb");
        $sql = "UPDATE actividades SET nombre = '".$name."',tipo='".$type."',descripcion='".$des."' WHERE id='".$id."';";
        $conn->query($sql);
        closeConn($conn);
    };
?>
    
<p>&nbsp;</p>
<div id='container'>
    <form name='update' method='post'>
        <table width='25%' align='center'>
            <tr>
                <td></td>
                <td><label for='id'></label>
                    <input type='hidden' name='id' id='id' value="<?php echo $myId ?>" /></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><label for='name'></label>
                    <input type='text' name='name' id='name' value="<?php echo $myName ?>" /></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td><label for='type'></label>
                    <input type='text' name='type' id='type' value="<?php echo $myType ?>" /></td>
            </tr>
            <tr>
                <td>Descripción</td>
                <td><label for='des'></label>
                    <input type='text' name='des' id='des' value="<?php echo $myDes ?>" /></td>
            </tr>
            <tr>
                <td colspan='2'><input  type='submit' name='up_bot' id='up_bot' value='Actualizar' /></td>
            </tr>
        </table>
    </form>
</div>
</html>