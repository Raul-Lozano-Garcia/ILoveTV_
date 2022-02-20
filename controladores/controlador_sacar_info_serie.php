<?php
    $ruta="../..";

    require_once($ruta."/modelos/modelo_series.php");

    $serie = new modelo_series();
    
    $series=$serie->getSerie($_POST["id"]);
?>