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
        $id=$_POST["id"];
        require_once("../../php/funciones.php");
        sesionSoloAdmin();
        crearHeader("../..");
?>

 <!-- MAIN -->
<main class="bg-light">

<!-- MODIFICAR SOCIO -->

<section id="modificarSocio" class="container">
    <div class="row py-2">
    <div class="form-body col-12 col-md-6 mx-auto p-5">
     
     <h1>Modificar socio</h1>
     <p>Introduce los datos para modificar el socio</p>
     <form action="../../controladores/controlador_modificar_socio.php" method="POST" id="requires-validation" novalidate>
        <input type="hidden" name="id" value="<?php echo $id ?>">

     <?php
        require_once("../../controladores/controlador_sacar_info_socio.php");
        foreach ($socios as $socio) {
         echo "
         <div class='col-md-12'>
             <input class='form-control' type='text' name='nombre' placeholder='Nombre' value='$socio[nombre]' maxlength='50' required>
             <div class='invalid-feedback'>Nombre vacío</div>
         </div>

         <div class='col-md-12 mt-3'>
             <input class='form-control' type='text' name='nick' placeholder='Nick' value='$socio[nick]' maxlength='50' required>
             <div class='invalid-feedback'>Nick vacío</div>
         </div>
         
         <div class='col-md-12 mt-3'>
             <input class='form-control' type='password' name='pass' placeholder='Nueva contraseña' maxlength='32' required>
             <div class='invalid-feedback'>Contraseña vacía</div>
         </div>
         
         <div class='col-md-12 mt-3'>
             <div class='mt-3'>
                 <input class='btn boton' type='submit' name='enviar' value='Enviar'>
             </div>
         </div>";
        }
    ?>
     </form>

 </div>
    </div>    
</section>

    
    <!-- FIN MODIFICAR SOCIO -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");

}else{
    header("series.php");
}
?>



</body>
</html>