/*
*   Controlador de uso general en las páginas web del sitio privado cuando no se ha iniciado sesión.
*   Sirve para manejar las plantillas del encabezado y pie del documento.
*/

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    const header = `
        <div class="navbar-fixed">
            <nav class="teal">
                <div class="nav-wrapper center-align">
                    <a href="index.html" class="brand-logo"><i class="material-icons">dashboard</i></a>
                </div>
            </nav>
        </div>
    `;
    const footer = `
        <div class="container">
            <div class="row">
                <b>Dashboard de CoffeeShop</b>
            </div>
        </div>
        <div class="footer-copyright">
        <div class="container">
            <span>© 2022 Copyright VeluShop. Todos los derechos reservados.</span>
            <span class="right">
                    <img src="../../resources/img/logo.png" height="40" style="vertical-align:middle" alt="VeluShop">
                </a>
            </span>
        </div>
    </div>
    `;
    document.querySelector('header').innerHTML = header;
    document.querySelector('footer').innerHTML = footer;
});