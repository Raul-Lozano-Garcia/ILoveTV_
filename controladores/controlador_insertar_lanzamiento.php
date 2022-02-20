<?php
    session_start();

    require_once("../php/funciones.php");

    $ruta="..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");
    
    $lanzamiento = new modelo_lanzamientos();

    if(isset($_POST["enviar"])){
        if(trim($_POST["idSerie"])!=="" && trim($_POST["idPlataforma"])!=="" && trim($_POST["fecha"])!==""){

            $lanzamiento->setLanzamiento(trim($_POST["idSerie"]),trim($_POST["idPlataforma"]),trim($_POST["fecha"]));
            
        }else{
            header("Location: ../vistas/lanzamientos/insertar_lanzamiento.php"); 
        }
        
    } 
    
?>