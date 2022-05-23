<?php
/*
*	Clase para manejar la tabla categorias de la base de datos.
*   Es clase hija de Validator.
*/
class Categoria_especie extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_categoria_especie = null;
    private $id_especie= null;
    private $id_categoria = null;

    
    //   Métodos para validar y asignar valores de los atributos.
    
    public function setId_categoria_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria_especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_especie($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_especie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setId_categoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria = $value;
            return true;
        } else {
            return false;
        }
    }


    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getId_categoria_especie()
    {
        return $this->id_categoria_especie;
    }

    public function getId_especie()
    {
        return $this->id_especie;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    
    public function searchRows($value)
    {
        $sql = 'SELECT id_categoria_especie, categoria, especie
                FROM categoria_especie
                INNER JOIN categoria c on categoria_especie.id_categoria = c.id_categoria
                INNER JOIN especie e on e.id_especie = categoria_especie.id_especie
                WHERE categoria ILIKE ? OR especie ILIKE ?
                ORDER BY categoria_especie DESC';
        $params = array("%$value%","$value%");
        return Database::getRows($sql, $params);
    }

    public function readSelect()
    {
        $sql = 'SELECT id_categoria_especie, categoria, especie
                FROM categoria_especie
                INNER JOIN categoria c on categoria_especie.id_categoria = c.id_categoria
                INNER JOIN especie e on e.id_especie = categoria_especie.id_especie 
                WHERE e.id_especie = ? ORDER BY id_categoria_especie';
        $params = array($this->id_especie);
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO categoria_especie(id_categoria, id_especie) 
                VALUES (?,?)';
        $params = array($this->id_categoria, $this->id_especie);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_categoria_especie, categoria, especie
                FROM categoria_especie
                INNER JOIN categoria c on categoria_especie.id_categoria = c.id_categoria
                INNER JOIN especie e on e.id_especie = categoria_especie.id_especie 
                ORDER BY id_categoria_especie desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_categoria_especie, id_categoria, id_especie
                FROM categoria_especie
                WHERE id_categoria_especie = ?';
        $params = array($this->id_categoria_especie);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE categoria_especie
                SET id_categoria = ?, id_especie = ?
                WHERE id_categoria_especie = ?';
        $params = array($this->id_categoria, $this->id_especie, $this->id_categoria_especie);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM producto
                WHERE id_producto = ?';
        $params = array($this->id_producto);
        return Database::executeRow($sql, $params);
    }


}
