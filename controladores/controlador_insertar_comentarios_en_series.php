<?php
    session_start();

    $ruta="..";

    require_once($ruta."/modelos/modelo_comentario.php");
    
    $comentario = new modelo_comentario();

    if(isset($_POST["enviarComentario"])){
        if(trim($_POST["comentario"])!==""){
            $comentario->setComentario($_POST["serie"],trim($_POST["comentario"]));
        }else{
            header("Location: ../vistas/series/info_serie.php?id=$_POST[serie]"); 
        }
        
    } 
    
?>