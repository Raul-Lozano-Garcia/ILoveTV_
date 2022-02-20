<?php
    session_start();
    
    $ruta="..";

    require_once($ruta."/modelos/modelo_socios.php");

    $socio = new modelo_socios();

    if(isset($_POST["enviar"])){
        $socio->buscarSocios(trim($_POST["nick"]),trim($_POST["pass"]));
    }
?>