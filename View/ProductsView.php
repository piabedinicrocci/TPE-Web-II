<?php

    require_once "./libs/smarty/Smarty.class.php";

    class ProductsView{

        private $title;
        private $titleEdit;
        private $titleCategory;
        
        function __construct(){
            $this->title = "Tabla de productos";
            $this->titleEdit = "Editar producto";
            $this->titleCategory = "Tabla de categorías";
        }
        //REDIRECCIONA LAS CONSTANTES PARA RUTEO 
        function ShowLocation($action){
            header("Location: ".BASE_URL.$action);
        }
        //MUESTRA EL HOME
        function ShowHome($products, $categorys){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('productos', $products);
            $smarty->assign('categorys', $categorys);
            // muestro el template 
            $smarty->display('templates/products.tpl'); 
        }
        //VISTA PARA EDITAR UN PRODUCTO
        function ShowEditProduct($product, $categorys){
            $smarty = new Smarty();
            $smarty->assign('producto', $product);
            $smarty->assign('categorys', $categorys);
            // muestro el template 
            $smarty->display('templates/editProduct.tpl'); 
        }
        //VISTA DE UN PRODUCTO EN DETALLE - TABLA PRODUCTO Y TABLA CATEGORIA
        function ShowItemDetail($product, $category){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('producto', $product);
            $smarty->assign('category', $category);
            // muestro el template 
            $smarty->display('templates/itemDetail.tpl'); 
        }
    }
?>