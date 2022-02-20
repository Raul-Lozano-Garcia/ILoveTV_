<?php
 
    require_once("$ruta/bd/bd.php");
    
    
    class modelo_comentario {
        private $bd;
        private $comentario;

        public function __construct() {
            $this->bd = conectar::conexion();
        }

        public function getUltimos5Comentarios() {
            $consulta = $this->bd->query("SELECT foto, socios.nombre nombre, fecha, texto
                                          FROM comentario INNER JOIN socios ON comentario.socio = socios.id INNER JOIN series ON comentario.serie = series.id
                                          ORDER BY fecha DESC LIMIT 5");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->comentario[] = $fila;
            }

            $consulta->close();
            return $this->comentario;
        }

        public function setComentario($serie,$comentario) {
            $fecha=date("Y-m-d",time());

            $consulta = $this->bd->prepare("INSERT INTO comentario VALUES (?,?,?,?)");
            $consulta->bind_param("iiss",$_SESSION["id"],$serie,$fecha,$comentario);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/series/info_serie.php?id=$serie");                
        }

        public function getComentarios($serie) {
            $consulta = $this->bd->query("SELECT nick, fecha, texto
                                          FROM comentario INNER JOIN socios ON comentario.socio = socios.id
                                          WHERE serie='$serie'
                                          ORDER BY fecha");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->comentario[] = $fila;
            }

            $consulta->close();
            return $this->comentario;
        }

        public function getComentariosAdmin() {
            $consulta = $this->bd->query("SELECT socios.nombre soc, series.nombre ser, comentario.texto, comentario.fecha, socio, serie
                                          FROM comentario INNER JOIN series ON series.id=comentario.serie INNER JOIN socios ON socios.id=comentario.socio");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->comentario[] = $fila;
            }

            $consulta->close();
            return $this->comentario;
        }

        public function borrarComentarios($socio,$serie) {
            $consulta = $this->bd->prepare("DELETE FROM comentario
                                            WHERE socio=? AND serie=?");
            $consulta->bind_param("ii",$socio, $serie);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/comentarios/comentarios.php");
        }
    }
?>