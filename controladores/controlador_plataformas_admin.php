<?php

    $ruta="../..";

    require_once($ruta."/modelos/modelo_plataformas.php");
    
    $plataforma = new modelo_plataformas();

    if(isset($_GET["busqueda"])){
        $plataformas=$plataforma->getPlataformasAdminBusqueda($_GET["busqueda"]);
    }else{
        $plataformas=$plataforma->getPlataformasAdmin();
    }  
    
?>