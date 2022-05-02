<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class especie extends Validator
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
        if ($this->validateNaturalNumber($value)) {
            $this->especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setActivo($file)
    {
        if ($this->validateBoolean($file, 500, 500)) {
            $this->activo = $this->getFileName();
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
}
