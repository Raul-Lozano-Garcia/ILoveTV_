<?php
    session_start();

    require_once("../php/funciones.php");

    $ruta="..";

    require_once($ruta."/modelos/modelo_series.php");
    
    $serie = new modelo_series();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && trim($_POST["descripcion"])!=="" && strlen(trim($_POST["nombre"]))<=50 && strlen(trim($_POST["descripcion"]))<=1000){
            $extension_imagen=extension_imagen($_FILES['foto']['type']);
            if($extension_imagen===''){
                header("Location: ../vistas/series/insertar_serie.php"); 
            }else{
                $serie->setSerie(trim($_POST["nombre"]),trim($_POST["descripcion"]),$_FILES['foto']['tmp_name'],$extension_imagen);
            }
        }else{
            header("Location: ../vistas/series/insertar_serie.php"); 
        }
        
    } 
    
?>