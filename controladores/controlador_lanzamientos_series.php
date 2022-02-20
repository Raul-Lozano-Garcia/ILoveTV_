<?php
    $ruta="../..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");

    $serie=new modelo_lanzamientos();

    $series=$serie->getSerie($_GET["id"]);
?>