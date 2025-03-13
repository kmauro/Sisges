<?php

class StockController{




    public function mostrarStockC(){

        $tablaDB = "productos";
        if(isset($_GET["id"])){
            $datosID = $_GET["id"]; //Si se cumple es porque estoy filtrando por subcategoria.
        }else{
            $datosID = 0; 
        }
        $respuesta = StockModel::mostrarStockM($tablaDB, $datosID);


        foreach($respuesta as $key => $value){
            echo '<tr>
                    
                    <td>'.$value["producto"].'</td>
                    <td>'.$value["categoria"].'</td>
                    <td>'.$value["subcategoria"].'</td>
                    <td>'.$value["precio"].'</td>
                    <td>'.$value["cantidad"].'/'.$value["cantidad_deseada"].'</td>
                    <td><a href="index.php?route=proveedores&id='.$value["id"].'"<button>Ver</button></a></td>
                    <td><a href="index.php?route=proveedores&id='.$value["id"].'"<button>Editar</button></a></td>
                </tr>';
        }
    }


    public function agregarProductoC(){
        $tablaDB = "productos";
        if (empty($_POST['nombre']) || empty($_POST['subcategoria']) || empty($_POST['precio']) || empty($_POST['cantidad']) || empty($_POST['cantidadD']) || empty($_POST['proveedor'])) {
            die("Todos los campos son obligatorios");
        }else{
            $datosRegistro = array("nombre"=>$_POST['nombre'], "subcategoria_id"=>$_POST['subcategoria'], "precio"=>$_POST['precio'], "cantidad"=>$_POST['cantidad'], "cantidad_deseada"=>$_POST['cantidadD'], "proveedor"=>$_POST['proveedor']);
            
            $respuesta = StockModel::agregarProductoM($tablaDB, $datosRegistro);

            if($respuesta == 1){
                header("location:index.php?route=stock");
            }else{
                echo "error";
            }
        }
    }

    
}

?>