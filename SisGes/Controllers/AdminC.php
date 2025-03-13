<?php

class AdminController{

    public function ingresoC(){
        if(isset($_POST["usuarioI"])){
            $datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);

            $tablaDB = "usuarios";

            $respuesta = AdminModel::IngresoM($datosC, $tablaDB);
            if(isset($respuesta["user"])){
                if($respuesta["user"] == $_POST["usuarioI"] && $respuesta["contra"] == $_POST["claveI"] ){

                    session_start();
                    $_SESSION["ingreso"] = true;
    
                    header("location:index.php?route=dashboard");
                }else{
                    echo " ERROR AL INGRESAR, DATOS INCORRECTOS ";
                }
            }else{
                echo " ERROR AL INGRESAR, ESE USUARIO NO EXISTE ";
            }
            


        }
    }

}

?>