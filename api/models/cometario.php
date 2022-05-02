<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class comentario extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_comentario = null;
    private $id_cliente = null;
    private $id_producto = null;

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_comentario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_comentario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_cliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
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


    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function Id_comentario()
    {
        return $this->id_comentario;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }
}
