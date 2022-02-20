<?php
    session_start();

    $ruta="..";

    require_once($ruta."/modelos/modelo_socios.php");
    
    $socio = new modelo_socios();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && strlen(trim($_POST["nombre"]))<=50){
            $nombre=trim($_POST['nombre']);
        }

        if(trim($_POST["nick"])!=="" && strlen(trim($_POST["nick"]))<=50){
            $nick=trim($_POST['nick']);
        }  

        if(trim($_POST["pass"])!=="" && strlen(trim($_POST["pass"]))<=32){
            $pass=trim($_POST['pass']);
        }  
        
        $socio->updateSocio($_POST["id"],$nombre,$nick,$pass);

        
    } 
    
?>