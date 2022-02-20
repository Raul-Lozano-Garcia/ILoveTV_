<?php
    session_start();

    $ruta="..";

    require_once($ruta."/modelos/modelo_series.php");
    
    $serie = new modelo_series();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && strlen(trim($_POST["nombre"]))<=50){
            $nombre=trim($_POST['nombre']);
        }

        if(trim($_POST["descripcion"])!=="" && strlen(trim($_POST["descripcion"]))<=1000){
            $descripcion=trim($_POST['descripcion']);
        }  
        
        $serie->updateSerie($_POST["id"],$nombre,$descripcion,$_POST["foto_antigua"],$_FILES["foto_nueva"]["tmp_name"],$_FILES["foto_nueva"]["type"]);

        
    } 
    
?>