// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = SERVER + 'private/producto.php?action=';
const ENDPOINT_CATEGORIA_ESPECIE = SERVER + 'private/categoria_especie.php?action=readSelect';
const ENDPOINT_ESPECIE = SERVER + 'private/especies.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PRODUCTOS);
    // Se define una variable para establecer las opciones del componente Modal.
    let options = {
        dismissible: false,
        onOpenStart: function () {
            // Se restauran los elementos del formulario.
            document.getElementById('save-form').reset();
        }
    }
    document.getElementById('titulo').textContent = 'Crear producto';
    fillSelect(ENDPOINT_CATEGORIA_ESPECIE, 'categoria', null);
    fillSelect(ENDPOINT_ESPECIE, 'especie', null);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
        <tr>
            <th class="text-center align-middle">${row.id_producto}</th>
            <td class="align-middle">${row.producto} 
                <span class="badge bg-danger" style="display:${row.activo == 'Activo'?'none':''}">Inactivo</span>
            </td>
            <td class="align-middle text-center">${row.disponible}</td>
            <td class="align-middle text-center">${row.precio}</td>
            <td class="align-middle text-center">${row.stock}</td>
            <td class="text-center align-middle">
                <a onclick="openCreate(${row.id_producto})"><i class="fa-solid fa-pencil table_icon"></i></a>
                <a href="#"><i class="fa-solid fa-eye table_icon"></i></a>
            </td>
        </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault();
    searchRows(API_PRODUCTOS, 'search-form');
});

// document.getElementById('categoria').addEventListener('change', function (event) {
//     event.preventDefault();
//     readSelect(ENDPOINT_CATEGORIA_ESPECIE, 'categoria');
// });

// Función para preparar el formulario al momento de insertar un registro.
function openCreate() {
    location.href = 'f_producto.html'
}

// Función para abrir el reporte de productos.
function openReport() {
    // Se establece la ruta del reporte en el servidor.
    let url = SERVER + 'reports/dashboard/productos.php';
    // Se abre el reporte en una nueva pestaña del navegador web.
    window.open(url);
}

// Función para capturar contenido dentro del WYSIWYG
function quillSave() {
    var especificacionQuill = quill.container.firstChild.innerHTML;
    console.log(especificacionQuill);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdate(id) {
    location.href = 'f_producto.html'
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id', id);
    // Petición para obtener los datos del registro solicitado.
    fetch(API_PRODUCTOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje en la consola indicando el problema.
        if (request.ok) {
            // Se obtiene la respuesta en formato JSON.
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id').value = response.dataset.id_producto;
                    document.getElementById('nombre').value = response.dataset.producto;
                    document.getElementById('descripcion').value = response.dataset.descripcion;
                    document.getElementById('descripcion').value = response.dataset.descripcion_producto;
                    fillSelect(ENDPOINT_CATEGORIAS, 'categoria', response.dataset.id_categoria);
                    if (response.dataset.estado_producto) {
                        document.getElementById('estado').checked = true;
                    } else {
                        document.getElementById('estado').checked = false;
                    }
                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    (document.getElementById('id').value) ? action = 'update' : action = 'create';
    // Se llama a la función para guardar el registro. Se encuentra en el archivo components.js
    saveRow(API_PRODUCTOS, action, 'save-form');
});

// Función para establecer el registro a eliminar y abrir una caja de diálogo de confirmación.
function openDelete(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PRODUCTOS, data);
}