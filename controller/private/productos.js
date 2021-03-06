// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = SERVER + 'private/producto.php?action=';
// Endpoint para rellenar el select de categoria
const ENDPOINT_CATEGORIA_ESPECIE = SERVER + 'private/categoria_especie.php?action=readSelect';
// Endpoint para rellenar el select de especie
const ENDPOINT_ESPECIE = SERVER + 'private/especies.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla
    readRows(API_PRODUCTOS);

    //Obtenemos el valor del id por el URL
    let defined = getQueryVariable("id");
    //Si no hay ninguna id definida significa que sera un create y si es undefined se ejecutara el update
    if (defined == undefined) {
    }
    else{
        openUpdate(defined);
    }
    // Se define una variable para establecer las opciones del componente Modal.
    let options = {
        dismissible: false,
        onOpenStart: function () {
            // Se restauran los elementos del formulario.
            document.getElementById('save-form').reset();
        }
    }
    document.getElementById('titulo').textContent = 'Crear producto';
    fillSelect(ENDPOINT_ESPECIE, 'especie', null);
});


function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if(pair[0] === variable) {
            return pair[1];
        }
    }
    return undefined;
}

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
                <a onclick="openEdit(${row.id_producto})"><i class="fa-solid fa-pencil table_icon"></i></a>
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

document.getElementById('especie').addEventListener('change', function (event) {
    // Se define un objeto con los datos del registro seleccionado.
    //const data = new FormData();
    //data.append('id', document.getElementById('especie').value);
    const ESPECIE = document.getElementById('especie').value;
    fillSelect(ENDPOINT_CATEGORIA_ESPECIE + '&id_especie=' + ESPECIE, 'categoria', null);
});

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

function openEdit(id) {
    //Se llama al formulario html para rellenar el formulario
    window.location.replace (`f_producto.html?id=${id}`)
}
// Función para preparar el formulario al momento de modificar un registro.
function openUpdate(id) {
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
                    document.getElementById('precio').value = response.dataset.precio;
                    document.getElementById('stock').value = response.dataset.stock;
                    if (response.dataset.activo === 'Activo') {
                        document.getElementById('activo').checked = true;
                    } else {
                        document.getElementById('activo').checked = false;
                    }
                    fillSelect(ENDPOINT_ESPECIE, 'especie', response.dataset.id_categoria);
                    document.getElementsByClassName("ql-editor")[0].innerHTML = response.dataset.especificacion;
                } else {
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    event.preventDefault();
    document.getElementById('especificacion').value = quill.container.firstChild.innerHTML;
    console.log(document.getElementById('especificacion').value);
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