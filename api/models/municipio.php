<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class municipio extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_municipio = null;
    private $id_departamento = null;
    private $municipio = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_municipio($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_municipio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_departamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMunicipio($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->municipio = $value;
            return true;
        } else {
            return false;
        }
    }


    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function Id_municipio()
    {
        return $this->id_municipio;
    }

    public function getId_departamento()
    {
        return $this->id_departamento;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }
}
