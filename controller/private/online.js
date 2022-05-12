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
                                <a href="#">
                                    <span class="navegacion-icon"><i class="fa-solid fa-house"></i></span>
                                    <span class="navegacion-title">Dasboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="productos.html">
                                    <span class="navegacion-icon"><i class="fa-solid fa-box"></i></span>
                                    <span class="navegacion-title">Producto</span>
                                </a>
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="navegacion-icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                                    <span class="navegacion-title">Cerar sesión</span>
                                </a>
                            </li>
                        </ul>
                        `;
                        const footer = `
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <h6 class="white-text">Dashboard</h6>
                                        <a class="white-text" href="mailto:dacasoft@outlook.com">
                                            <i class="material-icons left">email</i>Ayuda
                                        </a>
                                    </div>
                                    <div class="col s12 m6">
                                        <h6 class="white-text">Enlaces</h6>
                                        <a class="white-text" href="../public/" target="_blank">
                                            <i class="material-icons left">store</i>Sitio público
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-copyright">
                                <div class="container">
                                    <span>© 2018-2022 Copyright CoffeeShop. Todos los derechos reservados.</span>
                                    <span class="right">Diseñado con
                                        <a href="http://materializecss.com/" target="_blank">
                                            <img src="../../resources/img/materialize.png" height="20" style="vertical-align:middle" alt="Materialize">
                                        </a>
                                    </span>
                                </div>
                            </div>
                        `;
                        document.querySelector('nav').innerHTML = nav;
                        document.querySelector('footer').innerHTML = footer;
                        // Se inicializa el componente Dropdown para que funcione la lista desplegable en los menús.
                        M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'));
                        // Se inicializa el componente Sidenav para que funcione la navegación lateral.
                        M.Sidenav.init(document.querySelectorAll('.sidenav'));
                    } else {
                        sweetAlert(3, response.exception, 'index.html');
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