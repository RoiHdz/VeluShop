<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class departamento extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_departamento = null;
    private $departamento = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_departamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDepartamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_departamento()
    {
        return $this->id_departamento;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }
}
