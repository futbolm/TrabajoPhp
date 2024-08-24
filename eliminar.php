<?php
    require_once("db.php");  
    ob_start(); 

    //Llamamos el id    
    $peli_id=$_GET['id'];

    $query="DELETE FROM peliculas WHERE peli_id= {$peli_id}"; 
    
    mysqli_query($conexion,$query); 
    
    header("Location: ./");

?>