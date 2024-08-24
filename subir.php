<?php require_once("db.php");
    ob_start(); 
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body >
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Stream</h1>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-success mr-2">HOME</a>   
        </div>
        <div class="row justify-content-center" >
            <h4 class="text-center col-md-12 mb-4">
                Ingrese los datos de la pelicula
            </h4>
            <form class="col-md-6" method="post">
                <div class="form-group">
                    <label for="pelicula">Nombre de la pelicula</label>
                    <input type="text" class="form-control" id="pelicula" name="peli_nombre">
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" class="form-control" id="genero" name="peli_genero">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de estreno</label>
                    <input type="date" class="form-control" id="fecha" name="peli_fechaEstreno">
                </div>
                <div class="form-group">
                    <label for="restricciones">Restricciones</label>
                    <input type="text" class="form-control" id="restricciones" name="peli_restricciones">
                </div>
                <div class="form-group">
                    <label for="imagen">URL Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="peli_img">
                </div>
                <div class="form-group">
                    <?php 
                        $query="SELECT dire_id, CONCAT(dire_nombre, ' ', dire_apellidos) as director FROM directore"; 
                        $res=mysqli_query($conexion,$query); 

                    ?>
                    <label for="director">Director</label>
                    <select name="peli_dire_id" id="director" class="form-control">
                    <option value="" disabled selected>- Seleccione un director -</option>
                        <?php 
                            while($fila=mysqli_fetch_assoc($res)){
                                ?>
                                    <option value="<?php echo $fila['dire_id'] ?>">
                                        <?php echo $fila['director'] ?>
                                    </option>

                            <?php }
                        ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
                </div>
            </form>
            <?php
                if(isset($_POST['guardar'])){
                    $peli_nombre=$_POST['peli_nombre']; 
                    $peli_genero=$_POST['peli_genero']; 
                    $peli_fechaEstreno=$_POST['peli_fechaEstreno']; 
                    $peli_restricciones=$_POST['peli_restricciones']; 
                    $peli_img=$_POST['peli_img']; 
                    $peli_dire_id=$_POST['peli_dire_id']; 

                    //echo $peli_img; 
                    $queryGuardar="INSERT INTO peliculas (peli_dire_id,peli_nombre,peli_img,peli_genero,peli_fechaEstreno,peli_restricciones) values 
                    ({$peli_dire_id},'{$peli_nombre}','{$peli_img}','{$peli_genero}','{$peli_fechaEstreno}','{$peli_restricciones}')"; 

                    mysqli_query($conexion, $queryGuardar);

                    header("Location: ./"); 
                    
                }
            
               
            ?>
        </div>
    </section>
</body>
</html>