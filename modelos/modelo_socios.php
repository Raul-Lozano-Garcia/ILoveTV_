<?php
   
    require_once("$ruta/bd/bd.php");
    
    
    class modelo_socios {
        private $bd;
        private $socios;

        public function __construct() {
            $this->bd = conectar::conexion();
        }

        public function buscarSocios($nick,$pass) {
            $consulta = $this->bd->prepare("SELECT id
                                            FROM socios
                                            WHERE nick=? AND pass=? AND activo='1'");
            $consulta->bind_param("ss",$nick,md5($pass));
            $consulta->bind_result($id);
            $consulta->execute();
            $consulta->store_result();
            $filas=$consulta->num_rows;

            if($filas===1){
                $consulta->fetch();
                $_SESSION["id"]=$id;
                if(isset($_POST["mantener"])){
                    $datos=session_encode();
                    setcookie("mantener",$datos,time()+365*24*60*60,"/");
                }
                $consulta->close();
                header("Location: ../index.php");
            }else{
                $consulta->close();
                header("Location: ../vistas/acceder/acceder.php");
            }
                               
        }

        public function getSociosAdmin() {
            $consulta = $this->bd->query("SELECT *
                                          FROM socios
                                          WHERE id<>0
                                          ORDER BY activo DESC");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->socios[] = $fila;
            }

            $consulta->close();
            return $this->socios;
        }

        public function getSociosAdminBusqueda($busqueda) {
            $consulta = $this->bd->query("SELECT *
                                          FROM socios
                                          WHERE nombre LIKE '%$busqueda%' AND id<>0
                                          ORDER BY activo DESC");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->socios[] = $fila;
            }

            $consulta->close();
            return $this->socios;
        }

        public function desactivarSocios($id) {
            $consulta = $this->bd->prepare("UPDATE socios
                                            SET activo='0'
                                            WHERE id=?");
            $consulta->bind_param("i",$id);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/socios/socios.php");
        }

        public function setSocio($nombre,$nick,$pass) {
            $consulta=$this->bd->prepare("INSERT INTO socios values (null,?,?,?,'1')");

            $consulta->bind_param("sss", $nombre, $nick, md5($pass));
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/socios/socios.php");              
        }

        public function updateSocio($id,$nombre,$nick,$pass) {
            $consulta=$this->bd->prepare("UPDATE socios SET nombre=?, nick=?, pass=? WHERE id=?");

            $consulta->bind_param("sssi",$nombre, $nick, md5($pass), $id);
            $consulta->execute();
            $consulta->close();
            header("Location: ../vistas/socios/socios.php");              
        }

        public function getSocio($id_socio) {
            $consulta = $this->bd->query("SELECT nombre,nick
                                          FROM socios
                                          WHERE id='$id_socio'");
                                          
            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $this->socios[] = $fila;
            }

            $consulta->close();
            return $this->socios;
        }
    }
?>