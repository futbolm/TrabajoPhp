<?php require_once("db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body class="bg-light text-dark">
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">BIENVENIDOS A STREAM</h1>
    <section class="container">
        <div class="row p-4">
            <a href="subir.php" class="btn btn-success mr-2">Subir Pelicula</a>
            <a href="directores.php" class="btn btn-info">Directores</a>
        </div>
        <div class="row">

        <?php

        //Conexion de base de datos 
        $conexion=mysqli_connect('localhost','root','','stream'); 

        $consulta="SELECT * FROM peliculas a LEFT JOIN directore b on a.peli_dire_id=b.dire_id";

        $query_res=mysqli_query($conexion,$consulta);
        //$fila=mysqli_fetch_array($queryConsulta); 
        
        $fila=mysqli_fetch_assoc($query_res); 
        
        // Loop 
        while($fila = mysqli_fetch_assoc($query_res)){
            ?>
                <div class="col-md-3 mb-3">
                    <img src="<?php echo $fila['peli_img'] ?>" alt="<?php echo $fila['peli_nombre'] ?>" style="width: 100%" class="rounded" >
                    <h4 class="mt-2"><?php echo $fila['peli_nombre'] ?></h4>
                    <div>
                        <strong>Director: </strong><?php echo $fila['dire_nombre'] . " " . $fila['dire_apellidos'];  ?>
                    </div>
                    <div>
                        <strong>Genero: </strong><?php echo $fila['peli_genero'] ?>
                    </div>
                    <div>
                        <strong>Rating: </strong><?php echo $fila['peli_restricciones'] ?>
                    </div>
                    <div>
                        <strong>Fecha De estreno: </strong><?php echo $fila['peli_fechaEstreno'] ?>
                    </div>
                    <div>
                        <a href="editar.php?id=<?php echo $fila['peli_id']?>" class="btn btn-success mt-2">Editar</a>
                        <a href="eliminar.php?id=<?php echo $fila['peli_id']?>" class="btn btn-danger mt-2" onclick="return confirmarEliminacion()">Borrar</a>
                    </div>
                </div>

        <?php } 

        ?>
  
        </div>
    </section>
</body>
</html>

<script src="codigo.js"></script>
