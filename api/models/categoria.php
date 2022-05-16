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

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_categoria, categoria, descripcion, activo FROM categoria
                WHERE categoria ILIKE ?
                ORDER BY id_categoria desc';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO  categoria(categoria, descripcion, activo) 
                VALUES (?,?,?)';
        $params = array($this->categoria, $this->descripcion, $this->activo);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_categoria, categoria, descripcion, activo FROM categoria
                ORDER BY id_categoria desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_categoria, categoria, descripcion, activo FROM categoria
                WHERE id_categoria = ?';
        $params = array($this->id_categoria);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        $sql = 'UPDATE categorias
                SET imagen_categoria = ?, nombre_categoria = ?, descripcion_categoria = ?
                WHERE id_categoria = ?';
        $params = array($this->imagen, $this->nombre, $this->descripcion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM categorias
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}

