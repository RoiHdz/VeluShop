<?php
/*
*	Clase para manejar la tabla venta_estado de la base de datos.
*/
class Venta_detalle extends Validator
{

    // Declaración de atributos (propiedades).
    private $id_venta_estado = null;
    private $estado = null;

    public function setId_venta_estado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_venta_estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateString($value,1,50)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId_venta_estado()
    {
        return $this->id_venta_estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }
}