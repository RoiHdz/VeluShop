<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class producto extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_cliente = null;
    private $nombre = null;
    private $apellido = null;
    private $username = null;
    private $pssword = null;
    private $email = null;
    private $id_municipio = null;
    private $direccion_1 = null;
    private $direccion_2 = null;
    private $activo = null;


    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId_producto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setProducto($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEspecificacion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 200)) {
            $this->especificacion= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateAlphanumeric($value, 2, 4)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setStock ($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->stock= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDisponible($value)
    {
        if ($this->validateBoolean($value)) {
            $this->disponible= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setActivo($value)
    {
        if ($this->validateBoolean($value)) {
            $this->activo= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_categoria_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_especie_categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getEspecificacion()
    {
        return $this->especificacion;
    }
    
    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock  ()
    {
        return $this->email;
    }

    public function getDisponible()
    {
        return $this->disponible;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function getId_categoria_especie()
    {
        return $this->id_categoria_especie;
    }

}
    