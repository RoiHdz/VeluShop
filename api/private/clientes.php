<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/cliente.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Cliente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAll()) {
                    $result['status'] = 1;
                } elseif (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay datos registrados';
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                // El'buscar' que esta dentro de $_POST es el Id del input de buscar
                if ($_POST['buscar'] == '') {
                    $result['exception'] = 'Ingrese un valor para buscar';
                } elseif ($result['dataset'] = $producto->searchRows($_POST['buscar'])) {
                    $result['status'] = 1;
                    $result['message'] = 'Valor encontrado';
                } elseif (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay coincidencias';
                }
                break;
            case 'create':
                $_POST = $producto->validateForm($_POST);
                if (!$producto->setNombre($_POST['nombre'])) {
                    $result['exception'] = 'Nombre incorrecto';
                } elseif (!$producto->setApellido($_POST['descripcion'])) {
                    $result['exception'] = 'Descripción incorrecta';
                } elseif (!$producto->setUsername($_POST['descripcion'])) {
                    $result['exception'] = 'Especificacion incorrecta';
                } elseif (!$producto->setPssword($_POST['precio'])) {
                    $result['exception'] = 'Precio incorrecto';
                } elseif (!$producto->setEmail(($_POST['stock']))) {
                    $result['exception'] = 'Stock incorrecto';
                } elseif (!$producto->setActivo(isset($_POST['activo']) ? 1 : 0)) {
                    $result['exception'] = 'Valor incorrecto';
                } elseif (!isset($_POST['categoria'])) {
                    $result['exception'] = 'Seleccione una rol';
                } elseif (!$producto->setId_municipio($_POST['categoria'])) {
                    $result['exception'] = 'Rol incorrecto';
                } elseif ($producto->createRow()) {
                    $result['status'] = 1;
                    $result['message'] = 'Producto creado correctamente';
                } else {
                    $result['exception'] = Database::getException();;
                }
                break;
            case 'readOne':
                if (!$producto->setId_cliente($_POST['id'])) {
                    $result['exception'] = 'Producto incorrecto';
                } elseif ($result['dataset'] = $producto->readOne()) {
                    $result['status'] = 1;
                } elseif (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'Producto inexistente';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if (!$producto->setId_cliente($_POST['id'])) {
                    $result['exception'] = 'Producto incorrecto';
                } elseif (!$data = $producto->readOne()) {
                    $result['exception'] = 'Producto inexistente';
                } elseif (!$producto->setNombre($_POST['nombre'])) {
                    $result['exception'] = 'Nombre incorrecto';
                } elseif (!$producto->setApellido($_POST['descripcion'])) {
                    $result['exception'] = 'Descripción incorrecta';
                } elseif (!$producto->setUsername($_POST['descripcion'])) {
                    $result['exception'] = 'Especificacion incorrecta';
                } elseif (!$producto->setPssword($_POST['precio'])) {
                    $result['exception'] = 'Precio incorrecto';
                } elseif (!$producto->setEmail($_POST['stock'])) {
                    $result['exception'] = 'Stock incorrecto';
                } elseif (!$producto->setActivo(isset($_POST['disponible']) ? 1 : 0)) {
                    $result['exception'] = 'Valor incorrecto';
                } elseif (!$producto->setId_municipio($_POST['categoria'])) {
                    $result['exception'] = 'Seleccione una categoría';
                } elseif ($producto->updateRow($data['imagen_producto'])) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = Database::getException();
                }
                break;
            case 'delete':

                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
