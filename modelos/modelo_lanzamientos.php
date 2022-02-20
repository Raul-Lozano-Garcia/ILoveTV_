<?php
    
    require_once("$ruta/bd/bd.php");
    
    
    class modelo_lanzamientos {
        private $bd;
        private $lanzamientos;

        public function __construct() {
            $this->bd = conectar::conexion();
        }

        public function get4UltimosLanzamientos($id_plataforma) {

            $consulta = $this->bd->query("SELECT plataformas.id idP, series.nombre, foto, fecha
                                    FROM lanzamientos INNER JOIN series ON lanzamientos.serie = series.id INNER JOIN plataformas ON plataformas.id = lanzamientos.plataforma
                                    WHERE plataformas.id='$id_plataforma' AND series.activo='1'
                                    ORDER BY fecha DESC LIMIT 4");


            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;

            }

            $consulta->close();
            return $this->lanzamientos;
            
        }

        public function getUltimosLanzamientos($id_plataforma) {

            $consulta = $this->bd->query("SELECT plataformas.id idP, series.id idS, series.nombre, foto
                                    FROM lanzamientos INNER JOIN series ON lanzamientos.serie = series.id INNER JOIN plataformas ON plataformas.id = lanzamientos.plataforma
                                    WHERE plataformas.id='$id_plataforma' AND series.activo='1'
                                    ORDER BY fecha");


            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;

            }

            $consulta->close();
            return $this->lanzamientos;
            
        }


        public function getPlataformasYFechasDondeSerie($id_serie) {
            $consulta = $this->bd->query("SELECT logotipo, fecha
                                          FROM plataformas INNER JOIN lanzamientos ON plataformas.id=lanzamientos.plataforma
                                          WHERE serie='$id_serie' AND plataformas.activo='1'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;
            }
            
            $consulta->close();
            return $this->lanzamientos;
        }

        public function getSerie($id_plataforma) {
            $consulta = $this->bd->query("SELECT series.nombre nom, foto, fecha
                                          FROM plataformas INNER JOIN lanzamientos ON plataformas.id=lanzamientos.plataforma INNER JOIN series ON series.id=lanzamientos.serie
                                          WHERE plataforma='$id_plataforma' AND series.activo='1'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;
            }
            
            $consulta->close();
            return $this->lanzamientos;
        }

        public function getLanzamientosAdmin() {
            $consulta = $this->bd->query("SELECT series.nombre ser, plataformas.nombre pla, lanzamientos.fecha, serie, plataforma
                                          FROM lanzamientos INNER JOIN series ON series.id=lanzamientos.serie INNER JOIN plataformas ON plataformas.id=lanzamientos.plataforma
                                          ORDER BY pla");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;
            }

            $consulta->close();
            return $this->lanzamientos;
        }

        public function setLanzamiento($idSerie,$idPlataforma,$fecha) {
            $consulta=$this->bd->prepare("INSERT INTO lanzamientos values (?,?,?)");

            $consulta->bind_param("iis",$idSerie, $idPlataforma, $fecha);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/lanzamientos/lanzamientos.php");              
        }

        public function getLanzamiento($id_serie,$id_plataforma) {
            $consulta = $this->bd->query("SELECT fecha
                                          FROM lanzamientos
                                          WHERE serie='$id_serie' AND plataforma='$id_plataforma'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->lanzamientos[] = $fila;
            }

            $consulta->close();
            return $this->lanzamientos;
        }

        public function updateLanzamiento($serie,$plataforma,$fecha,$serieAnt,$plataformaAnt) {
            $consulta=$this->bd->prepare("UPDATE lanzamientos SET serie=?, plataforma=?, fecha=? WHERE serie=? AND plataforma=?");

            $consulta->bind_param("iisii",$serie, $plataforma, $fecha, $serieAnt, $plataformaAnt);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/lanzamientos/lanzamientos.php");              
        }

        public function borrarLanzamientos($serie,$plataforma) {
            $consulta = $this->bd->prepare("DELETE FROM lanzamientos
                                            WHERE serie=? AND plataforma=?");
            $consulta->bind_param("ii",$serie, $plataforma);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/lanzamientos/lanzamientos.php");
        }

        
    }
?>