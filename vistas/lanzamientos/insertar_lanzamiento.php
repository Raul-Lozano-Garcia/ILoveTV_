<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILoveTV || La web para los amantes de las series</title>
    <link rel="icon" href="../../assets/imagenes/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script type="text/javascript" src="../../js/app.js" defer></script>
</head>
<body>

<?php
    require_once("../../php/funciones.php");
    sesionSoloAdmin();
    crearHeader("../..");
?>

 <!-- MAIN -->
<main class="bg-light">

<!-- INSERTAR LANZAMIENTO -->

<section id="insertarLanzamiento" class="container">
    <div class="row py-2">
    <div class="form-body col-12 col-md-6 mx-auto p-5">
     
     <h1>Nuevo lanzamiento</h1>
     <p>Introduce los datos del nuevo lanzamiento</p>
     <form action="../../controladores/controlador_insertar_lanzamiento.php" method="POST" id="requires-validation" novalidate>
        <div class="col-md-12">
             <select class="form-control" name="idSerie" id="idSerie" required>
                 <option value="">--Seleccione una serie--</option>


            <?php
                require_once("../../controladores/controlador_series_admin.php");

                if (isset($series)) {
                    foreach ($series as $serie) {
                        echo "
                        <option value='$serie[id]'>$serie[nombre]</option>
                        ";
                    }
                } else {
                    header("Location:lanzamientos.php");
                }
            ?>



             </select>
             <div class="invalid-feedback">No hay ninguna serie seleccionada</div>
         </div>

         <div class="col-md-12 mt-3">
             <select class="form-control" name="idPlataforma" id="idPlataforma" required>
                 <option value="">--Seleccione una plataforma--</option>


            <?php
                require_once("../../controladores/controlador_plataformas_admin.php");

                if (isset($plataformas)) {
                    foreach ($plataformas as $plataforma) {
                        echo "
                        <option value='$plataforma[id]'>$plataforma[nombre]</option>
                        ";
                    }
                } else {
                    header("Location:lanzamientos.php");
                }
            ?>



             </select>
             <div class="invalid-feedback">No hay ninguna plataforma seleccionada</div>
         </div>

         <div class="col-md-12 mt-3">
             <label for="fecha">Fecha: </label>
             <input class="form-control" type="date" name="fecha" required>
             <div class="invalid-feedback">Fecha vacía</div>
         </div>
         
         <div class="col-md-12 mt-3">
             <div class="mt-3">
                 <input class='btn boton' type="submit" name="enviar" value="Enviar">
             </div>
         </div>
     </form>

 </div>
    </div>    
</section>

    
    <!-- FIN INSERTAR LANZAMIENTO -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>