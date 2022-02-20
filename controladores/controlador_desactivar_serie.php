<?php
    $ruta="..";

    require_once($ruta."/modelos/modelo_series.php");

    $serie = new modelo_series();
    
    if(isset($_POST["enviarActivo"])){
        $serie->desactivarSeries($_POST["id"]);
    }
?>