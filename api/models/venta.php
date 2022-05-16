<?php
/*
*	Clase para manejar la tabla venta de la base de datos.
*/
class Venta extends Validator{

    // Declaración de atributos (propiedades).
    private $id_venta = null;
    private $id_cliente = null;
    private $fecha = null;
    private $pago = null;
    private $metodo_pago = null;
    private $id_venta_estado = null;
    private $total = null;

    public function setId_venta($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_venta = $value;
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

    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPago($value)
    {
        if ($this->validateBoolean($value)) {
            $this->pago = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMetodo_pago($value)
    {
        if ($this->validateAlphanumeric($value,1,50)) {
            $this->metodo_pago = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_venta_estado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_venta_estado = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }

     // Métodos para obtener valores de los atributos.
    
    public function getId_venta()
    {
        return $this->id_venta;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getPago()
    {
        return $this->pago;
    }
    public function getMetodo_pago()
    {
        return $this->metodo_pago;
    }
    public function getId_venta_estado()
    {
        return $this->id_venta_estado;
    }

    public function getTotal()
    {
        return $this->total;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_venta,nombre,fecha,pago,metodo_pago,venta_estado,total FROM v_venta
        WHERE nombre ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'insert into public.venta (id_cliente, fecha, pago, metodo_pago, id_venta_estado, total) 
        values (?,?,?,?,?,?);';
        $params = array($this->username, $this->pssword, $this->email, $this->nombre, $this->apellido, $this->activo, $this->id_rol);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_venta,nombre,fecha,pago,metodo_pago,venta_estado,total FROM v_venta
                ORDER BY id_venta desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_usuario,username,pssword,email,nombre,activo,rol FROM v_usuario
                WHERE id_usuario = ?';
        $params = array($this->id_usuario);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE usuarios 
                SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}