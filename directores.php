<?php require_once("db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body class="">
    <h1 class="text-center pt-5 pb-5 bg-warning font-weight-bold ">BIENVENIDO A LOS DIRECTORES</h1>
    <section class="container">
        <div class="row p-4">
            <a href="subirDirector.php" class="btn btn-success mr-2">Subir Director</a>
            <a href="index.php" class="btn btn-info">Ir a la cartelera</a>
        </div>
        <div class="row">

        <?php

        //Conexion de base de datos 
        $conexion=mysqli_connect('localhost','root','','stream'); 

        $consulta="SELECT * FROM directore";

        $query_res=mysqli_query($conexion,$consulta);
        //$fila=mysqli_fetch_array($queryConsulta); 
        
        $fila=mysqli_fetch_assoc($query_res); 

        //$ConsultaEdad="SELECT dire_edad,(year(now()) - year(fechaDeNacimiento)) as EdadActual FROM directore" ; 
        //$queryre=mysqli_query($conexion,$ConsultaEdad); 
        //$filas=mysqli_fetch_assoc($queryre); 
        
        // Loop 
        while($fila = mysqli_fetch_assoc($query_res)){
            ?>
                <div class="col-md-3 mb-3">
                    <img src="<?php echo $fila['dire_img'] ?>" alt="<?php echo $fila['dire_nombre'] ?>" style="width: 100%" class="rounded">
                    <h4 class="mt-2"><?php echo $fila['dire_nombre'] . " " .  $fila['dire_apellidos']; ?></h4>
                    <div>
                        <strong>Director: </strong><?php echo $fila['dire_nombre'] . " " . $fila['dire_apellidos'];  ?>
                    </div>
                    <div>
                        <strong>Fecha De Nacimiento: </strong><?php echo $fila['fechaDeNacimiento'] ?>
                    </div>
                    <div>
                        <strong>Nacionalidad: </strong><?php echo $fila['dire_nacionalidad'] ?>
                    </div>
                    <div>
                        <?php
                            
                            $ConsultaEdad = "SELECT year(now()) - year(fechaDeNacimiento) as EdadActual FROM directore WHERE dire_id={$fila['dire_id']}" ; 
                            $queryre=mysqli_query($conexion, $ConsultaEdad); 
                            $edad=mysqli_fetch_assoc($queryre); 
                        ?>
                        <strong>Edad: </strong><?php echo $edad['EdadActual'] ?>
                    </div>
                    <div>
                        <strong>Educacion: </strong><?php echo $fila['dire_educacion'] ?>
                    </div>
                    <div>
                        <a href="modificarDirector.php?id=<?php echo $fila['dire_id']?>" class="btn btn-success mt-2">Editar</a>
                        <a href="borrarDirector.php?id=<?php echo $fila['dire_id'] ?>" class="btn btn-danger mt-2" onclick="return confirmarEliminacion()">Borrar</a>
                    </div>
                </div>

        <?php } 

        ?>
  
        </div>
    </section>
</body>
</html>
<script src="codigo.js"></script>
