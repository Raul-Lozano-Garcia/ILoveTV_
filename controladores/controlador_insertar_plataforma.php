<?php
    session_start();

    require_once("../php/funciones.php");

    $ruta="..";

    require_once($ruta."/modelos/modelo_plataformas.php");
    
    $plataforma = new modelo_plataformas();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && strlen(trim($_POST["nombre"]))<=50){
            $extension_imagen=extension_imagen($_FILES['logotipo']['type']);
            if($extension_imagen===''){
                header("Location: ../vistas/plataformas/insertar_plataforma.php"); 
            }else{
                $plataforma->setPlataforma(trim($_POST["nombre"]),$_FILES['logotipo']['tmp_name'],$extension_imagen);
            }
        }else{
            header("Location: ../vistas/plataformas/insertar_plataforma.php"); 
        }
        
    } 
    
?>