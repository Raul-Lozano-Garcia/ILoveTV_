<?php

    $ruta="../..";

    require_once($ruta."/modelos/modelo_series.php");
    
    $serie = new modelo_series();

    if(isset($_GET["busqueda"])){
        $series=$serie->getSeriesAdminBusqueda($_GET["busqueda"]);
    }else{
        $series=$serie->getSeriesAdmin();
    }  
    
?>