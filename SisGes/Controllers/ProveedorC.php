<?php 

class ProveedorController{
    public static function mostrarProveedorC(){
        
        $tablaDB="proveedores";
        if(isset($_GET["id"])){
            $datosID = $_GET["id"];
        }else{
            $datosID = 0;
        }
        $respuesta = ProveedorModel::mostrarProveedoresM($tablaDB, $datosID);


        foreach($respuesta as $key => $value){
            echo '<tr>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["cuit"].'</td>
                    <td>'.$value["telefono"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["direccion"].'</td>
                    <td><a href="index.php?route=proveedores&id='.$value["id"].'"<button>Editar</button></a></td>
                    <td><a href="index.php?route=proveedores&id='.$value["id"].'"<button>Borrar</button></a></td>
                    
            </tr>';
        }
    }
}


?> 