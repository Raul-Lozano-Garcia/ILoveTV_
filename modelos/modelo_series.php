<?php

    
    require_once("$ruta/bd/bd.php");
    
    
    class modelo_series {
        private $bd;
        private $series;

        public function __construct() {
            $this->bd = conectar::conexion();
        }

        public function getSerie($id_serie) {
            $consulta = $this->bd->query("SELECT id,foto,nombre,descripcion
                                          FROM series
                                          WHERE id='$id_serie'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->series[] = $fila;
            }

            $consulta->close();
            return $this->series;
        }

        public function getSeriesAdmin() {
            $consulta = $this->bd->query("SELECT *
                                          FROM series
                                          ORDER BY activo DESC");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->series[] = $fila;
            }

            $consulta->close();
            return $this->series;
        }

        public function getSeriesAdminBusqueda($busqueda) {
            $consulta = $this->bd->query("SELECT *
                                          FROM series
                                          WHERE nombre LIKE '%$busqueda%'
                                          ORDER BY activo DESC");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->series[] = $fila;
            }

            $consulta->close();
            return $this->series;
        }

        public function desactivarSeries($id) {
            $consulta = $this->bd->prepare("UPDATE series
                                            SET activo='0'
                                            WHERE id=?");
            $consulta->bind_param("i",$id);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/series/series.php");
        }

        public function setSerie($nombre,$descripcion,$tmp,$extension) {
            $consulta=$this->bd->prepare("INSERT INTO series values (?,?,?,?,'1')");

            if(!file_exists("../assets/imagenes/series")){
                mkdir("../assets/imagenes/series");
            };

            $consulta_id="SELECT AUTO_INCREMENT FROM information_schema.TABLES where TABLE_SCHEMA='series' and TABLE_NAME='series'"; 
            $datos_id=$this->bd->query($consulta_id);
            $id_siguiente=$datos_id->fetch_array(MYSQLI_ASSOC);
            $id=$id_siguiente['AUTO_INCREMENT'];

            $nombre_imagen="$id".$extension;
            move_uploaded_file($tmp,"../assets/imagenes/series/$nombre_imagen");
            $foto=$nombre_imagen;

            $consulta->bind_param("isss",$id, $nombre, $descripcion, $foto);
            $consulta->execute();
            $conexion->insert_id;
            $consulta->close();
            header("Location: ../vistas/series/series.php");              
        }

        public function updateSerie($id,$nombre,$descripcion,$foto_antigua,$tmp,$extension) {
            require_once("../php/funciones.php");

            $consulta=$this->bd->prepare("UPDATE series SET nombre=?, descripcion=?, foto=? WHERE id=?");

            if(!file_exists("../assets/imagenes/series")){
                mkdir("../assets/imagenes/series");
            };

            if($tmp!=""){

                $extension_imagen=extension_imagen($extension);
                if($extension_imagen!==''){
                    $foto=$tmp;
                    $nombre_imagen="$id".$extension_imagen;
                    move_uploaded_file($tmp,"../assets/imagenes/series/$nombre_imagen");
                    $foto=$nombre_imagen;
                }else{
                    $foto=$foto_antigua;  
                }
            }else{
                $foto=$foto_antigua;
            } 

            $consulta->bind_param("sssi",$nombre, $descripcion, $foto, $id);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/series/series.php");              
        }

        public function getSeriesAdminSinPropia($id_serie) {
            $consulta = $this->bd->query("SELECT *
                                          FROM series
                                          WHERE id<>'$id_serie'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->series[] = $fila;
            }

            $consulta->close();
            return $this->series;
        }
    }
?>