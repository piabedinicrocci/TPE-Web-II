<?php

    require_once "./libs/smarty/Smarty.class.php";

    class LoginView{
        private $title;

        function __construct(){
            $this->title = "Tabla de productos";
        }
        //MUESTRA EL LOGIN
        function ShowLogin($message = NULL){
            $smarty = new Smarty();
            $smarty->assign('message', $message);
            $smarty->display('templates/login.tpl');        
        }
        //MUESTRA LA PAGINA PARA EL ADMIN
        function ShowVerify($products, $categorys){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('productos', $products);
            $smarty->assign('categorys', $categorys);
            // muestro el template 
            $smarty->display('templates/verify.tpl'); 
        }
    }
?>