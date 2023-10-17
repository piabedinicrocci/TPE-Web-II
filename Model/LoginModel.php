<?php

    require_once 'config.php';

    class LoginModel{
        private $db;
        //CREO LA CONEXIÓN CON LA BASE DE DATOS
        function __construct(){
            $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . NAME, USER, PASSWORD);
        }
        //TRAIGO EL USUARIO
        function GetUser($user){
            $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
            $sentencia->execute(array($user));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
    }
?>