<?php
    $ruta="../..";

    require_once($ruta."/modelos/modelo_plataformas.php");

    $plataforma = new modelo_plataformas();

    $plataformas=$plataforma->getPlataformasSegunSerie($_GET["id"]);
?>