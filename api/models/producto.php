<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Producto extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_producto = null;
    private $producto = null;
    private $descripcion = null;
    private $especificacion = null;
    private $precio = null;
    private $stock = null;
    private $disponible = null;
    private $activo = null;
    private $id_categoria_especie = null;


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
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEspecificacion($value)
    {
        if ($this->validateHTML($value, 1, 200)) {
            $this->especificacion= $value;
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

    public function setStock ($value)
    {
        if ($this->validateNaturalNumber($value)) {
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
            $this->id_categoria_especie= $value;
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
        return $this->stock;
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

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    
    public function searchRows($value)
    {
        $sql = 'SELECT id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo, categoria, especie 
                FROM v_producto
                WHERE producto ILIKE ? OR categoria ILIKE ? OR especie ILIKE ?
                ORDER BY producto';
        $params = array("%$value%","$value%","$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO producto(producto, descripcion, especificacion, precio, stock, disponible, activo, id_categoria_especie)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
        $params = array($this->producto, $this->descripcion, $this->especificacion, $this->precio, $this->stock, $this->disponible, $this->activo, $this->id_categoria_especie);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo, categoria, especie 
                FROM v_producto ORDER BY id_producto desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo, categoria, especie 
                FROM v_producto
                WHERE id_producto = ?';
        $params = array($this->id_producto);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE producto
        SET producto = ?, descripcion = ?, especificacion = ?,precio = ?, stock = ?, disponible = ?, activo = ?, id_categoria_especie = ?
        WHERE id_producto = ?';
        $params = array($this->producto, $this->descripcion, $this->especificacion, $this->precio, $this->stock, $this->disponible, $this->activo, $this->id_categoria_especie, $this->id_producto);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM producto
                WHERE id_producto = ?';
        $params = array($this->id_producto);
        return Database::executeRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

}
    