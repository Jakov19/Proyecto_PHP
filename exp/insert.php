<?php

    include("dbconn.php");
              
    echo "<link rel='stylesheet' href='stilo_tabla.css' >";
    
     // Recoger los datos de añadir //
    if(isset($_POST['add'])){
        $myName="'".$_POST['name']."'";
        $myType="'".$_POST['type']."'";
        $myDes="'".$_POST['des']."'";
        insertar($myName,$myType,$myDes);
                
        // Refescar la pagina read.php //
        header("Location:read.php?count=1");
        
        
    };

    function insertar($name,$type,$des){
        $conn = openConn("lasalledb");
        $sql = "INSERT INTO actividades (nombre, tipo, descripcion) VALUES (".$name.",".$type.",".$des.");";
        $conn->query($sql);
        closeConn($conn);
    };
?>
