<?php
    require_once("db.php"); 
    ob_start(); 

    $dire_id=$_GET['id']; 

    $queryEliminar="DELETE FROM directore WHERE dire_id={$dire_id}"; 

    mysqli_query($conexion,$queryEliminar); 

    header("Location: directores.php")





?>