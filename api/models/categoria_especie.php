<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Categoria_especie extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_categoria_especie = null;
    private $id_especie= null;
    private $id_categoria = null;

    
    //   Métodos para validar y asignar valores de los atributos.
    
    public function setId_categoria_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria_especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_categoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria = $value;
            return true;
        } else {
            return false;
        }
    }


    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getId_categoria_especie()
    {
        return $this->id_categoria_especie;
    }

    public function getId_especie()
    {
        return $this->id_especie;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    // Funciones SCRUD 

    // public function readProductosCategoria()
    // {
    //     $sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
    //             FROM productos INNER JOIN categorias USING(id_categoria)
    //             WHERE id_categoria = ? AND estado_producto = true
    //             ORDER BY nombre_producto';
    //     $params = array($this->id);
    //     return Database::getRows($sql, $params);
    // }
}
