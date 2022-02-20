<?php

    $ruta="../..";

    require_once($ruta."/modelos/modelo_socios.php");
    
    $socio = new modelo_socios();

    if(isset($_GET["busqueda"])){
        $socios=$socio->getSociosAdminBusqueda($_GET["busqueda"]);
    }else{
        $socios=$socio->getSociosAdmin();
    }  
    
?>