<?php
    $ruta="..";

    require_once($ruta."/modelos/modelo_comentario.php");

    $comentario = new modelo_comentario();
    
    if(isset($_POST["enviarId"])){
        $comentario->borrarComentarios($_POST["socio"],$_POST["serie"]);
    }
?>