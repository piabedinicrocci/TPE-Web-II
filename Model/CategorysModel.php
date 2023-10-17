<?php

    require_once 'config.php';

    class CategorysModel{

        private $db;
        //CONEXIÓN CON LA BDD
        function __construct(){
            $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . NAME, USER, PASSWORD);
        }
        //OBTENGO CATEGORIAS
        function GetCategorys(){
            $sentencia = $this->db->prepare("SELECT * FROM categoria");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        //BUSCO CATEGORIA POR ID
        function GetCategoryById($category_id){
            $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
            $sentencia->execute(array($category_id));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
        //INSERTO CATEGORIA
        function InsertCategory($category){
            $sentencia = $this->db->prepare("INSERT INTO categoria(nombre_categoria) VALUES(?)");
            $sentencia->execute(array($category));
        }
        //ELIMINO CATEGORIA
        function DeleteCategory($category_id){
            $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
            $sentencia->execute(array($category_id));
        }
        //ACTUALIZO CATEGORIA
        function UpdateCategory($category,$category_id){
            $sentencia = $this->db->prepare("UPDATE categoria SET nombre_categoria=? WHERE categoria.id_categoria=?");
            $sentencia->execute(array($category,$category_id));
        }
    }
?>