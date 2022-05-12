<?php
/*
*	Clase para manejar la tabla venta_detalle de la base de datos.
*/
class Venta_detalle extends Validator
{

    // Declaración de atributos (propiedades).
    private $id_venta_detalle = null;
    private $id_venta = null;
    private $id_producto = null;
    private $precio = null;
    private $cantidad = null;

    public function setId_venta_detalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_venta_detalle = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setId_venta($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_venta = $value;
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
    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
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

    // Métodos para obtener valores de los atributos.

    public function getId_venta_detalle()
    {
        return $this->id_venta_detalle;
    }

    public function getId_venta()
    {
        return $this->id_venta;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
}
