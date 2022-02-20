<?php
    $ruta="../..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");

    $lanzamiento = new modelo_lanzamientos();
    
    $lanzamientos=$lanzamiento->getLanzamiento($_POST["serie"],$_POST["plataforma"]);
?>