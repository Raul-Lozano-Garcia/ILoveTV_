<?php
    session_start();

    require_once("../php/funciones.php");

    $ruta="..";

    require_once($ruta."/modelos/modelo_socios.php");
    
    $socio = new modelo_socios();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && trim($_POST["nick"])!=="" && trim($_POST["pass"])!=="" && strlen(trim($_POST["nombre"]))<=50 && strlen(trim($_POST["nick"]))<=50 && strlen(trim($_POST["pass"]))<=32){
            $socio->setSocio(trim($_POST["nombre"]),trim($_POST["nick"]),trim($_POST["pass"]));
        }else{
            header("Location: ../vistas/socios/insertar_socio.php"); 
        }
        
    } 
    
?>