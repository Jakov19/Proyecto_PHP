<?php

///-------------------
// Abrir conexion
//-------------------
function openConn($database=NULL){
	$serverName = 'localhost';
	$userName = 'jose';
	$password = 'salle';
	
	$conn = new mysqli($serverName,$userName,$password,$database) or
		die ("Error: No conectado con la Base de Datos.".$conn->connect_error);
        
	$conn->set_charset('utf8') or
                die ("Error setting charset: ".$conn->error);
        
	return($conn);
}
//---------------------
// Cerrar conexion
//---------------------
function closeConn($conn){
	$conn->close();
}

?>