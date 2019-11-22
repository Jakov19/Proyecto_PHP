<?php

    include("dbconn.php");
              
    echo "<link rel='stylesheet' href='stilo_tabla.css' >";
    
   // Recoger el id para eliminar //
    if(isset($_GET['id'])){
        $id=$_GET["id"];
        borrar($id);
    };
  
    function borrar($id){
        $conn = openConn("lasalledb");
        $sql = "DELETE FROM actividades WHERE id=".$id;
        $conn->query($sql);
        closeConn($conn);
    };
 
    // Refescar la pagina read.php //
    header("Location:read.php?count=1");
?>
