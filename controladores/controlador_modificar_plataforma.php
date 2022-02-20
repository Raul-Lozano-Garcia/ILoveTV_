<?php
    session_start();

    $ruta="..";

    require_once($ruta."/modelos/modelo_plataformas.php");
    
    $plataforma = new modelo_plataformas();

    if(isset($_POST["enviar"])){
        if(trim($_POST["nombre"])!=="" && strlen(trim($_POST["nombre"]))<=50){
            $nombre=trim($_POST['nombre']);
        }

        $plataforma->updatePlataforma($_POST["id"],$nombre,$_POST["logotipo_antiguo"],$_FILES["logotipo_nuevo"]["tmp_name"],$_FILES["logotipo_nuevo"]["type"]);

        
    } 
    
?>