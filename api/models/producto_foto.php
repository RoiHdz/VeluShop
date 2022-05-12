<?php
/*
*	Clase para manejar la tabla productos_fotos de la base de datos.
*/
class Productos_fotos extends Validator{

    // Declaración de atributos (propiedades).
    private $id_producto_foto = null;
    private $id_producto = null;
    private $foto = null;
    private $ruta = '../images/product/';

    public function setId_producto_foto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto_foto = $value;
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

    public function setFoto($file)
    {
        if ($this->validateImageFile($file, 700, 700)) {
            $this->imagen = $this->getFileName();
            return true;
        }
        else{
            return false;
        }
    }

    //  Métodos get (para obtener valores de los atributos)
    
    public function getId_producto_foto()
    {
        return $this->id_producto_foto;
    }
    public function getId_producto()
    {
        return $this->id_producto;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function getRuta()
    {
        return $this->ruta;
    }
}