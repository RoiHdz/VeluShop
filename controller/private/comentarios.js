// Constante para establecer conectar con la api de usuario
const API_USUARIOS = SERVER + 'private/usuario.php?action=';
const ENDPOINT_ESPECIE = SERVER + 'private/especies.php?action=readAll';
const ENDPOINT_ROL = SERVER + 'private/rol.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_USUARIOS);
    // Se define una variable para establecer las opciones del componente Modal.
    let options = {
        dismissible: false,
        onOpenStart: function () {
            // Se restauran los elementos del formulario.
            document.getElementById('save-form').reset();
        }
    }
    document.getElementById('titulo').textContent = 'Crear usuario';
    fillSelect(ENDPOINT_ROL, 'rol', null);

    //Obtenemos el valor del id por el URL
    let defined = getQueryVariable("id");
    //Si no hay ninguna id definida significa que sera un create y si es undefined se ejecutara el update
    if (defined != undefined) {
        openUpdate(defined);
    }
});

//Funcion para obtener el id desde la URL
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
        // Se crean las filas con los datos de la base de datos
        content += `
            <tr>
                <th class="text-center align-middle">${row.id_usuario}</th>
                <td class="align-middle">${row.nombre}
                    <span class="badge bg-danger" style="display:${row.activo == 'Activo'?'none':''}">Inactivo</span>
                </td>
                <td class="align-middle">${row.username}</td>
                <td class="align-middle text-center">${row.rol}</td>
                <td class="text-center align-middle">
                    <a onclick="openEdit(${row.id_usuario})"><i class="fa-solid fa-pencil table_icon"></i></a>
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
    searchRows(API_USUARIOS, 'search-form');
});

function openEdit(id) {
    window.location.replace (`f_usuario.html?id=${id}`)
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdate(id) {
    // Se asigna el título para la caja de diálogo (modal).
    document.getElementById('titulo').textContent = 'Actualizar usuario';
    // Se deshabilitan los campos de alias y contraseña.
    document.getElementById('username').disabled = true;
    document.getElementById('clave').disabled = true;
    document.getElementById('confirmar').disabled = true;
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id', id);
    // Petición para obtener los datos del registro solicitado.
    fetch(API_USUARIOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje en la consola indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id').value = response.dataset.id_usuario;
                    document.getElementById('nombre').value = response.dataset.nombre;
                    document.getElementById('apellido').value = response.dataset.apellido;
                    document.getElementById('email').value = response.dataset.email;
                    document.getElementById('username').value = response.dataset.username;
                    fillSelect(ENDPOINT_ROL, 'rol', response.dataset.id_rol);
                    if (response.dataset.activo) {
                        document.getElementById('activo').checked = true;
                    } else {
                        document.getElementById('activo').checked = false;
                    }
                } else {
                    alert(response.exception);
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
    saveRow(API_USUARIOS, action, 'save-form');
});

// Función para establecer el registro a eliminar y abrir una caja de diálogo de confirmación.
function openDelete(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_USUARIOS, data);
}
