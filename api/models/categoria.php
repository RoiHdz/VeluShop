<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*/
class Categoria extends Validator
{
    // Declaración de atributos.
    private $id_categoria = null;
    private $categoria = null;
    private $descripcion = null;
    private $activo = null;


    
    //   Métodos para validar y asignar valores de los atributos.
    
    public function setId_categoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCategoria($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->descripcion = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->descripcion = null;
            return true;
        }
    }

    public function setActivo($value)
    {
        if ($this->validateBoolean($value)) {
            $this->activo = $value;
            return true;
        } else {
            return false;
        }
    }

    
    //   Métodos para obtener valores de los atributos.
    

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getActivo()
    {
        return $this->activo;
    }
}