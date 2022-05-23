<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Ingreso extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_ingreso = null; //Llave Primaria
    private $id_producto = null; //Llave Foranea
    private $cantidad = null;
    private $fecha = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_ingreso($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_ingreso = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_producto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getId_ingreso()
    {
        return $this->id_ingreso;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    
    public function searchRows($value)
    {
        $sql = 'SELECT id_ingreso, producto, cantidad, fecha FROM ingreso
                INNER JOIN producto p on p.id_producto = ingreso.id_producto
                WHERE producto ILIKE ?
                ORDER BY fecha DESC';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO ingreso(id_producto, cantidad) 
                VALUES (?,?)';
        $params = array($this->id_producto, $this->cantidad);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_ingreso, producto, cantidad, fecha FROM ingreso
                INNER JOIN producto p on p.id_producto = ingreso.id_producto
                ORDER BY fecha DESC';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_ingreso, id_producto, cantidad, fecha FROM ingreso
                WHERE id_ingreso = ?';
        $params = array($this->id_ingreso);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE ingreso
        SET id_producto = ?, cantidad = ?
        WHERE id_ingreso = ?';
        $params = array($this->id_producto, $this->cantidad, $this->id_ingreso);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM ingreso
                WHERE id_ingreso = ?';
        $params = array($this->id_ingreso);
        return Database::executeRow($sql, $params);
    }

}
