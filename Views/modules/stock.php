<?php


if(!$_SESSION["ingreso"]){
	header("location:index.php?route=login");
	exit();
}
	
?>


<div class = "row">
<h1 class="col-2">Productos</h1>
<a class = "col-1" href="index.php?route=agregarProducto"><button type="button" class="btn btn-primary">Agregar</button></a>
</div>




<table class="table table-dark  table-bordered table-striped">
<thead>
    <tr>
      
      <th scope="col">Producto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Subcategoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Proveedores</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
        <?php

            $mostrar = new StockController();
            $mostrar->mostrarStockC();

        ?>
  </tbody>
</table>

<style>
  .row{
    padding-bottom: 20px;
  }

  .table {
    padding-top: 25px;
    border-radius: 8px;
    overflow: hidden; /* Evita que los bordes se corten */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}
</style>

