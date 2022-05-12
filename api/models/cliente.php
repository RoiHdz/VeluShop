<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Cliente extends Validator
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


    
    //   Métodos para validar y asignar valores de los atributos.
    
    public function setId_cliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->apellido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsername($value)
    {
        if ($this->validateAlphanumeric($value, 1, 10)) {
            $this->username = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPssword($value)
    {
        if ($this->validatePassword($value)) {
            $this->pssword = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_municipio($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion_1($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->direccion_1 = $value;
            return true;
        } else {
            return false;
        }
    }

    
    public function setDireccion_2($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->direccion_2 = $value;
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
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPssword()
    {
        return $this->pssword;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId_municipio()
    {
        return $this->id_municipio;
    }

    public function getDireccion_1()
    {
        return $this->direccion_1;
    }

    public function getDireccion_2()
    {
        return $this->direccion_2;
    }

    public function getActivo()
    {
        return $this->activo;
    }
}

