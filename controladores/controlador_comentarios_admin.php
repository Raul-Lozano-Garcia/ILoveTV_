<?php

    $ruta="../..";

    require_once($ruta."/modelos/modelo_comentario.php");
    
    $comentario = new modelo_comentario();

    $comentarios=$comentario->getComentariosAdmin();
    
    
?>