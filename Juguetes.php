<?php
require_once('Utils.php');

class Juguetes
{
    protected $_conexion;
    public function __construct()
    {
        //Conectamos a la BD
        $this->_conexion=Utils::conectar();
    }
    //Funcion para mostrar todos los juguetes
    public function selectAll()
    {
        $sql = 'SELECT * FROM juguetes';
        return $this->_conexion->query($sql);
    }

    //Funcion para mostrar los juguetes que coincidan con el id
    public function select($id)
    {
        $sql = 'SELECT * FROM juguetes WHERE id = ' . (int)$id;
        $rows = $this->_conexion->query($sql);
        if ((int)$rows->num_rows) {
            //Si hay cojemos el conjunto que nos devuelve y guardamos la unica fila
            $row = $rows->fetch_assoc();
        } else {
            //Si no encuentra devolvemos null
            $row = null;
        }
        return $row;
    }

    //Funcion para insertar juguetes
    public function insert($data){
        //Comprobamos que nombre no este vacio
        if(empty($data['nombre'])){
            throw new Exception('Debe rellenar el campo nombre');
        }
        //Comprobamos que recibimos precio, si no existe lo creamos vacio.
        if(!isset($data['precio'])){
            $data['precio'] =null;
        }
        $sql='INSERT INTO juguetes (nombre, precio) VALUES ("'.$data['nombre'].'", "'.$data['precio'].'")';
        $this->_conexion->query($sql);
        return $this->_conexion->insert_id;
    }

    //Funcion para actualizar juguetes
    public function update($data){
        //Comprobamos que nombre no este vacio
        if(empty($data['nombre'])){
            throw new Exception('Debe rellenar el campo nombre');
        }
        //Comprobamos que recibimos precio, si no existe lo creamos vacio.
        if(!isset($data['precio'])){
            $data['precio'] =null;
        }
        //Comprobamos que recibimos id, si no mostramos mensaje de error.
        if(empty($data['id'])){
            throw new Exception('Debe indicar la PK de la fila que desea modificar');
        }
        $sql='UPDATE juguetes SET nombre = "'.$data['nombre'].'", precio = "'.$data['precio'].'" WHERE id= '.(int)$data['id'];
        $this->_conexion->query($sql);
        return (int)$data['id'];
    }

    //Funcion para borrar juguetes
    public function delete($id){
        $sql= 'DELETE FROM juguetes WHERE id = '.(int)$id;
        return $this->_conexion->query($sql);
    }
}
?>