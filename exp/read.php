<?php
    include("dbconn.php"); 
    echo "<link rel='stylesheet' href='stilo_tabla.css'>";

    // Recoger los datos escritos en index.php //
    if(isset($_GET['search'])){
        $mySearch="'".$_GET['search']."'";
        //echo "Tipo de actividad: ".$mySearch;
        search($mySearch);
    };
    
    if(isset($_GET['count'])){
        $count=$_GET["count"];
        if($count==1){
           mostrar(); 
        }
    };
        
    // Funcion para filtrar //
    function search($type){
        $conn = openConn("lasalledb");
        $sql = "SELECT * FROM actividades where tipo =".$type;
        $result=$conn->query($sql);
        
        table($result);
      
        closeConn($conn);
    };
    
    // Fucion para insertar un nuevo registro //
    echo "<div id='container'><form name='insert' action='insert.php' method='post'><table><tr>"
    . "<td><input type='text' name='name' /></td>"
    . "<td><input type='text' name='type' /></td>"
    . "<td><input type='text' name='des' /></td>"
    . "<td><input type='submit' value='Añadir' name='add' /></td>"
    . "</tr></table></form></div>";
    
    // Boton de regreso a index.php //
    echo "<form name='volver' action='index.php' method='get'><div id='container'>"
    . "<input type='submit' value='Volver' name='Volver' />"
    . "</div></form>";
    
    // Funcion para mostrar todos los datos //
    function mostrar(){
        $conn = openConn("lasalledb");
        $sql = "SELECT * FROM actividades";
        $result=$conn->query($sql);
        
        table($result);
        
        closeConn($conn);
    };
    
    // Función para pintar la tabla //
    function table($res){
        if($res->num_rows>0){
                echo "<div id='container'><table><thead><tr>";
                echo "<th>Nombre</th><th>Tipo</th><th>Descripcion</th><th>Accion";
                echo "</tr></thead></table>";

                while($row=$res->fetch_assoc()){
                    $varId=$row["id"];
                    $varName=$row["nombre"];
                    $varType=$row["tipo"];
                    $varDes=$row["descripcion"];
                    echo "<table><tr>";
                    echo "<td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>".$row["descripcion"]."</td>";
                    echo "<td><a href="."'update.php?id=".$varId."&name=".$varName."&type=".$varType."&des=".$varDes."'>"
                            ."<input type='submit' value='Actualizar' name='upd' />"
                        ."<a href="."'delete.php?id=".$varId."'>"
                            ."<input type='submit' value='Borrar' name='del' /></td></tr></table>";
                }
                echo "</div>";
            }else{
                echo "No hay resultados";
            };
    };
?>