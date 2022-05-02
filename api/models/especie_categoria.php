<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class especie_categoria extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_especie_categoria = null;
    private $id_especie= null;
    private $id_categoria = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_especie_categoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_especie_categoria = $value;
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
    public function Id_especie_categoria()
    {
        return $this->id_especie_categoria;
    }

    public function getId_especie()
    {
        return $this->id_especie;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }
}
