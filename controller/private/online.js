/*
*   Controlador de uso general en las páginas web del sitio privado cuando se ha iniciado sesión.
*   Sirve para manejar las plantillas del encabezado y pie del documento.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = SERVER + 'private/usuario.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Petición para obtener en nombre del usuario que ha iniciado sesión.
    fetch(API + 'getUser', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje en la consola indicando el problema.
        if (request.ok) {
            // Se obtiene la respuesta en formato JSON.
            request.json().then(function (response) {
                // Se revisa si el usuario está autenticado, de lo contrario se envía a iniciar sesión.
                if (response.session) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se direcciona a la página web principal.
                    console.log(response);
                    if (response.status) {
                        const nav = `
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="navegacion-icon"><img src="../../resources/img/icono.png" height="40"></span>
                                    <span class="navegacion-title">Velu Shop</span>
                                </a>
                            </li>
                            <li>
                                <a href="main.html">
                                    <span class="navegacion-icon"><i class="fa-solid fa-house"></i></span>
                                    <span class="navegacion-title">Dasboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="navegacion-icon" data-bs-toggle="collapse" href="#collapseProductos" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-box"></i></span>
                                    <span class="navegacion-title" data-bs-toggle="collapse" href="#collapseProductos" role="button" aria-expanded="false" aria-controls="collapseExample">Producto</span>
                                </a>
                                <div class="collapse" id="collapseProductos">
                                    <div class="card card-body card_collapse">
                                        <a href="productos.html" class="btn cb"><i class="fa-solid fa-angle-right"></i>Productos</a>
                                        <a href="ingreso.html" class="btn cb mt-1"><i class="fa-solid fa-angle-right"></i>Orden de ingreso</a>
                                        <a href="comentario.html" class="btn cb mt-1"><i class="fa-solid fa-angle-right"></i>Comentarios</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="Pedidos.html">
                                    <span class="navegacion-icon"><i class="fa-solid fa-truck"></i></span>
                                    <span class="navegacion-title">Pedido</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="navegacion-icon" data-bs-toggle="collapse" href="#collapseUsuario" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-user"></i></span>
                                    <span class="navegacion-title" data-bs-toggle="collapse" href="#collapseUsuario" role="button" aria-expanded="false" aria-controls="collapseExample">Usuario</span>
                                </a>
                                <div class="collapse" id="collapseUsuario">
                                    <div class="card card-body card_collapse">
                                        <a href="usuario_clientes.html" class="btn cb"><i class="fa-solid fa-angle-right"></i>Clientes</a>
                                        <a href="usuario_usuario.html" class="btn cb mt-1"><i class="fa-solid fa-angle-right"></i>Usuarios</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span alt="Admin" class="navegacion-icon" data-bs-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-user-tie"></i></span>
                                    <span class="navegacion-title" data-bs-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="false" aria-controls="collapseExample">Admnistración</span>
                                </a>
                                <div class="collapse" id="collapseAdmin">
                                    <div class="card card-body card_collapse">
                                        <a href="administracion_ce.html" class="btn cb"><i class="fa-solid fa-angle-right"></i>Categoria/Especie</a>
                                        <a href="administracion_asignacion.html" class="btn cb mt-1"><i class="fa-solid fa-angle-right"></i>Asignacion</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" onclick="logOut()">
                                    <span class="navegacion-icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                                    <span class="navegacion-title">Cerar sesión</span>
                                </a>
                            </li>
                        </ul>
                        `;
                        const user = `
                            <h6 class="me-5">${response.username}</h6>
                        `;
                        document.querySelector('nav').innerHTML = nav;
                        document.getElementById('user').innerHTML = user;
                    } else {
                        location.href = 'index.html';
                    }
                } else {
                    location.href = 'index.html';
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    });
});