
document.addEventListener("DOMContentLoaded", function() {
    cargarOpciones("categoria", "categorias");
    cargarOpciones("proveedor", "proveedores");

    document.getElementById("categoria").addEventListener("change", function() {
        let categoriaId = this.value;
        cargarOpciones("subcategoria", "subcategorias", categoriaId);
    });

    function cargarOpciones(selectId, tipo, categoriaId = null) {
        let url = `Controllers/get_data.php?type=${tipo}`;
        if (categoriaId) {
            url += `&categoria_id=${categoriaId}`;
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById(selectId);
                select.innerHTML = '<option value="">Seleccione una opción</option>';
                data.forEach(item => {
                    select.innerHTML += `<option value="${item.id}">${item.nombre}</option>`;
                });
            })
            .catch(error => console.error('Error cargando datos:', error));
    }
});
