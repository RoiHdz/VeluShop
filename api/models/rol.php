<?php

class Rol extends Validator
{

    // Declaración de atributos (propiedades).
    private $id_rol = null;
    private $rol = null;

    public function setId_rol($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_rol = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setRol($value)
    {
        if ($this->validateString($value,1,25)) {
            $this->rol = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function getRol()
    {
        return $this->rol;
    }

    //Metodo para leer todos los datos a travez de un select

    public function readAll()
    {
        $sql = 'SELECT id_rol,rol.rol FROM Rol';
        $params = null;
        return Database::getRows($sql, $params);
    }
}