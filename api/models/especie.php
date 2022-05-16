<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Especie extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_especie = null;
    private $especie = null;
    private $activo = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEspecie($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setActivo($value)
    {
        if ($this->validateBoolean($value)) {
            $this->activo = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_especie()
    {
        return $this->id_especie;
    }

    public function getEspecie()
    {
        return $this->especie;
    }
    public function getActivo()
    {
        return $this->activo;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT id_especie,especie,activo FROM especie
                WHERE especie ILIKE ? 
                ORDER BY id_especie DESC';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO especie(especie, activo)
                VALUES(?, ?)';
        $params = array($this->especie, $this->activo);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_especie,especie,activo FROM especie
                ORDER BY especie DESC';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_especie,especie,activo FROM especie
                WHERE id_especie = ?';
        $params = array($this->id_especie);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        $sql = 'UPDATE especie
                SET especie = ?, activo = ?
                WHERE id_especie = ?';
        $params = array($this->especie, $this->activo, $this->id_especie);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM especie
                WHERE id_especie = ?';
        $params = array($this->id_especie);
        return Database::executeRow($sql, $params);
    }
}
