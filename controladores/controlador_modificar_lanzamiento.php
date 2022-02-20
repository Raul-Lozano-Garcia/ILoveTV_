<?php
    session_start();

    $ruta="..";

    require_once($ruta."/modelos/modelo_lanzamientos.php");
    
    $lanzamiento = new modelo_lanzamientos();

    if(isset($_POST["enviar"])){
        if(trim($_POST["idSerie"])!==""){
            $id_serie=trim($_POST['idSerie']);
        }

        if(trim($_POST["idPlataforma"])!==""){
            $id_plataforma=trim($_POST['idPlataforma']);
        }  

        if(trim($_POST["fecha"])!==""){
            $fecha=trim($_POST['fecha']);
        }  
        
        $lanzamiento->updateLanzamiento($id_serie,$id_plataforma,$fecha,$_POST["serieAnt"],$_POST["plataformaAnt"]);

        
    } 
    
?>