<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Comentario extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_comentario = null;
    private $id_cliente = null;
    private $id_producto = null;
    private $comentario = null;

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

    public function setComentario($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->comentario = $value;
            return true;
        } else {
            return false;
        }
    }


    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId_comentario()
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

    public function getComentario()
    {
        return $this->comentario;
    }
    
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    
    public function searchRows($value)
    {
        $sql = 'SELECT id_comentario,producto,Nombre,comentario FROM V_comentario
                WHERE producto ILIKE ? OR nombre ILIKE ? OR comentario ILIKE ?
                ORDER BY id_comentario DESC';
        $params = array("%$value%","$value%","$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO comentario(id_producto, id_cliente, comentario) VALUES (?,?,?);';
        $params = array($this->id_producto, $this->id_cliente, $this->comentario);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_comentario,producto,Nombre,comentario FROM V_comentario
        ORDER BY id_comentario desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_comentario, id_producto, id_cliente, comentario 
                FROM comentario
                WHERE id_comentario = ?';
        $params = array($this->id_comentario);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE comentario
        SET comentario = ?, descripcion = ?, especificacion = ?,precio = ?, stock = ?, disponible = ?, activo = ?, id_categoria_especie = ?
        WHERE id_producto = ?';
        $params = array($this->producto, $this->descripcion, $this->especificacion, $this->precio, $this->stock, $this->disponible, $this->activo, $this->id_categoria_especie, $this->id_producto);
        return Database::executeRow($sql, $params);
    }
}
