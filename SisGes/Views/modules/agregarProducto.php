<h1>Agregar Producto</h1>

	<div class="row">
        <div class  = "col-1"></div>
        <div class="col-4">
            <form class="row g-3" method="POST" id="productoForm">
                <div class="col-12">
                    <label for="nombre" class="form-label">Nombre Producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
                </div>

                <div class="col-md-6">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select id="categoria" name="categoria" class="form-select"></select>
                </div>

                <div class="col-md-6">
                    <label for="subcategoria" class="form-label">Subcategoría</label>
                    <select id="subcategoria" name="subcategoria" class="form-select"></select>
                </div>

                <div class="col-12">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="99999">
                </div>

                <div class="col-md-6">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="999">
                </div>

                <div class="col-md-6">
                    <label for="cantidadD" class="form-label">Cantidad Deseada</label>
                    <input type="number" class="form-control" id="cantidadD" name="cantidadD" placeholder="999">
                </div>

                <div class="col-12">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <select id="proveedor" name="proveedor" class="form-select"></select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
    



    <script src="Views/assets/js/get_data.js"> </script>
    <script> 
        document.getElementById("productoForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("Controllers/guardar_producto.php", {
            method: "POST",
            body: formData
        })
        
        .catch(error => console.error("Error:", error));
    });
 </script>

        
    <?php
    
   // $controller = new StockController();
   // $controller->agregarProductoC();
    
    ?>



<?php


?>