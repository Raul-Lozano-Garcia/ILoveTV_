<?php
    $ruta="..";

    require_once($ruta."/modelos/modelo_socios.php");

    $socio = new modelo_socios();
    
    if(isset($_POST["enviarActivo"])){
        $socio->desactivarSocios($_POST["id"]);
    }
?>