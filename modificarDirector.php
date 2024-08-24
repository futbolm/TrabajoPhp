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
<body>
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Stream</h1>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-success mr-2">HOME</a>   
        </div>
        <div class="row justify-content-center" >
            <h4 class="text-center col-md-12 mb-4">
                Ingrese los datos de los directores
            </h4>
            <?php 
                $dire_id=$_GET['id']; 
                $querydire="SELECT * FROM directore where dire_id={$dire_id}"; 
                $querydires=mysqli_query($conexion,$querydire); 
                $direFila=mysqli_fetch_assoc($querydires); 
                
            ?>
            <form class="col-md-6" method="post" >
                <div class="form-group">
                    <label for="nombre">Nombre del director</label>
                    <input type="text" class="form-control" id="nombre" name="dire_nombre"
                    value="<?php echo $direFila['dire_nombre']?>">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido del director</label>
                    <input type="text" class="form-control" id="apellido" name="dire_apellidos"
                    value="<?php echo $direFila['dire_apellidos']?>">
                </div>
               
                <div class="form-group">
                    <label for="nacimiento">Fecha De Nacimiento</label>
                    <input type="date" class="form-control" id="nacimiento" 
                    name="dire_fecha" 
                    value="<?php echo $direFila['fechaDeNacimiento'] ?>">
                </div>
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad" name="dire_nacionalidad"
                    value="<?php echo $direFila['dire_nacionalidad']?>">
                </div>
                <div class="form-group">
                    <label for="educacion">Educacion</label>
                    <input type="text" class="form-control" id="educacion" name="dire_educacion"
                    value="<?php echo $direFila['dire_educacion']?>">
                </div>
                <div class="form-group">
                    <label for="imagen">IMG del director</label>
                    <input type="text" class="form-control" id="imagen" name="dire_img"
                    value="<?php echo $direFila['dire_img']?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="editar" value="Editar">
                </div>
            </form>
            <?php 
                if(isset($_POST['editar'])){
                    $dire_nombre=$_POST['dire_nombre']; 
                    $dire_apellidos=$_POST['dire_apellidos']; 
                    
                    $dire_fecha=$_POST['dire_fecha'];
                    //$dire_nombre=$_POST['dire_nombre']; 
                    $dire_nacionalidad=$_POST['dire_nacionalidad']; 
                    $dire_educacion=$_POST['dire_educacion'];
                    $dire_img=$_POST['dire_img']; 

                    $queryUpdate="UPDATE directore set dire_nombre='{$dire_nombre}',dire_apellidos='{$dire_apellidos}'
                    ,fechaDeNacimiento='{$dire_fecha}',dire_nacionalidad='{$dire_nacionalidad}', dire_educacion='{$dire_educacion}', 
                    dire_img='{$dire_img}' WHERE dire_id={$dire_id}"; 
                    
                    //$queryInsertar="INSERT INTO directore (dire_nombre,dire_apellidos,fechaDeNacimiento, 
                    //dire_nacionalidad,dire_edad,dire_img) VALUES 
                    //('{$dire_nombre}','{$dire_apellidos}','{$dire_fecha}','{$dire_nacionalidad}'
                    //,'{$dire_edad}','{$dire_img}')"; 

                    mysqli_query($conexion,$queryUpdate); 

                    header("Location: directores.php"); 

                }
            
            ?>
           
            </div>
    </section>
</body>
</html>