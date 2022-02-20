<?php
    $ruta="..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");

    $lanzamiento = new modelo_lanzamientos();
    
    if(isset($_POST["enviarBorrar"])){
        $lanzamiento->borrarLanzamientos($_POST["serie"],$_POST["plataforma"]);
    }
?>