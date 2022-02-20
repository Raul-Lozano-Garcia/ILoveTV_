<?php
    $ruta="../..";

    require_once($ruta."/modelos/modelo_socios.php");

    $socio = new modelo_socios();
    
    $socios=$socio->getSocio($_POST["id"]);
?>