<?php

    $ruta="../..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");
    
    $lanzamiento = new modelo_lanzamientos();

    $lanzamientos=$lanzamiento->getLanzamientosAdmin();
    
?>