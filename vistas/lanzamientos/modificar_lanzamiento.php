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

    if(isset($_POST["enviarId"])){
        require_once("../../php/funciones.php");
        sesionSoloAdmin();
        crearHeader("../..");
?>

 <!-- MAIN -->
<main class="bg-light">

<!-- MODIFICAR LANZAMIENTO -->

<section id="modificarLanzamiento" class="container">
    <div class="row py-2">
    <div class="form-body col-12 col-md-6 mx-auto p-5">
     
     <h1>Modificar lanzamiento</h1>
     <p>Introduce los datos para modificar el lanzamiento</p>
     <form action="../../controladores/controlador_modificar_lanzamiento.php" method="POST">
        <input type="hidden" name="serieAnt" value="<?php echo $_POST["serie"] ?>">
        <input type="hidden" name="plataformaAnt" value="<?php echo $_POST["plataforma"] ?>">
     
     <div class="col-md-12">
             <select class="form-control" name="idSerie" id="idSerie">
                
                
                <?php
                    require_once("../../controladores/controlador_sacar_info_serie_admin.php");

                    foreach ($series as $serie) {
                        echo "
                            <option value='$serie[id]'>$serie[nombre]</option>
                        ";
                    }


                    require_once("../../controladores/controlador_series_admin_sinPropia.php");

                    if (isset($series)) {
                        foreach ($series as $serie) {
                            echo "
                            <option value='$serie[id]'>$serie[nombre]</option>
                            ";
                        }
                    }
                ?>



             </select>
         </div>

         <div class="col-md-12 mt-3">
             <select class="form-control" name="idPlataforma" id="idPlataforma">
                
                
                <?php
                    require_once("../../controladores/controlador_sacar_info_plataforma_admin.php");

                    foreach ($plataformas as $plataforma) {
                        echo "
                            <option value='$plataforma[id]'>$plataforma[nombre]</option>
                        ";
                    }


                    require_once("../../controladores/controlador_plataformas_admin_sinPropia.php");

                    if (isset($plataformas)) {
                        foreach ($plataformas as $plataforma) {
                            echo "
                            <option value='$plataforma[id]'>$plataforma[nombre]</option>
                            ";
                        }
                    }
                ?>



             </select>
         </div>

         <?php
        require_once("../../controladores/controlador_sacar_info_lanzamiento.php");
        foreach ($lanzamientos as $lanzamiento) {
         echo "
         <div class='col-md-12 mt-3'>
            <label id='fecha'>Fecha</label>
             <input class='form-control' type='date' name='fecha' id='fecha 'value='$lanzamiento[fecha]' required>
             <div class='invalid-feedback'>Fecha vacía</div>
         </div>";
        }
    ?>
         <div class="col-md-12 mt-3">
             <div class="mt-3">
                 <input class='btn boton' type="submit" name="enviar" value="Enviar">
             </div>
         </div>


     </form>

 </div>
    </div>    
</section>

    
    <!-- FIN MODIFICAR LANZAMIENTO -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");

}else{
    header("lanzamientos.php");
}
?>



</body>
</html>