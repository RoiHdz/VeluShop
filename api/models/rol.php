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
}