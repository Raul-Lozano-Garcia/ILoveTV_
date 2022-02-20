<?php
    
    require_once("$ruta/bd/bd.php");
    
    
    class modelo_plataformas {
        private $bd;
        private $plataformas;

        public function __construct() {
            $this->bd = conectar::conexion();
        }

        public function getPlataformas() {
            $consulta = $this->bd->query("SELECT id,logotipo
                                          FROM plataformas WHERE activo='1'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }
            
            $consulta->close();
            return $this->plataformas;
        }

        public function getPlataformasSegunSerie($id_plataforma) {
            $consulta = $this->bd->query("SELECT logotipo
                                          FROM plataformas 
                                          WHERE id='$id_plataforma' AND activo='1'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }
            
            $consulta->close();
            return $this->plataformas;
        }

        public function getPlataformasAdmin() {
            $consulta = $this->bd->query("SELECT *
                                          FROM plataformas");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }

            $consulta->close();
            return $this->plataformas;
        }

        public function getPlataformasAdminBusqueda($busqueda) {
            $consulta = $this->bd->query("SELECT *
                                          FROM plataformas
                                          WHERE nombre LIKE '%$busqueda%'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }

            $consulta->close();
            return $this->plataformas;
        }

        public function setPlataforma($nombre,$tmp,$extension) {
            $consulta=$this->bd->prepare("INSERT INTO plataformas values (?,?,'1',?)");

            if(!file_exists("../assets/imagenes/plataformas")){
                mkdir("../assets/imagenes/plataformas");
            };

            $consulta_id="SELECT AUTO_INCREMENT FROM information_schema.TABLES where TABLE_SCHEMA='series' and TABLE_NAME='plataformas'"; 
            $datos_id=$this->bd->query($consulta_id);
            $id_siguiente=$datos_id->fetch_array(MYSQLI_ASSOC);
            $id=$id_siguiente['AUTO_INCREMENT'];

            $nombre_imagen="$id".$extension;
            move_uploaded_file($tmp,"../assets/imagenes/plataformas/$nombre_imagen");
            $foto=$nombre_imagen;

            $consulta->bind_param("iss",$id, $nombre, $foto);
            $consulta->execute();
            $conexion->insert_id;
            $consulta->close();
            header("Location: ../vistas/plataformas/plataformas.php");              
        }

        public function getPlataforma($id_plataforma) {
            $consulta = $this->bd->query("SELECT id, logotipo,nombre
                                          FROM plataformas
                                          WHERE id='$id_plataforma'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }

            $consulta->close();
            return $this->plataformas;
        }

        public function updatePlataforma($id,$nombre,$foto_antigua,$tmp,$extension) {
            require_once("../php/funciones.php");

            $consulta=$this->bd->prepare("UPDATE plataformas SET nombre=?, logotipo=? WHERE id=?");

            if(!file_exists("../assets/imagenes/plataformas")){
                mkdir("../assets/imagenes/plataformas");
            };

            if($tmp!=""){

                $extension_imagen=extension_imagen($extension);
                if($extension_imagen!==''){
                    $foto=$tmp;
                    $nombre_imagen="$id".$extension_imagen;
                    move_uploaded_file($tmp,"../assets/imagenes/plataformas/$nombre_imagen");
                    $foto=$nombre_imagen;
                }else{
                    $foto=$foto_antigua;  
                }
            }else{
                $foto=$foto_antigua;
            } 

            $consulta->bind_param("ssi",$nombre, $foto, $id);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/plataformas/plataformas.php");              
        }

        public function getPlataformasAdminSinPropia($id_plataforma) {
            $consulta = $this->bd->query("SELECT *
                                          FROM plataformas
                                          WHERE id<>'$id_plataforma'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->plataformas[] = $fila;
            }

            $consulta->close();
            return $this->plataformas;
        }
    }
?>