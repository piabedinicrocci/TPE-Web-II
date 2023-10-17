<?php

    require_once "./View/ProductsView.php";
    require_once "./View/CategorysView.php";
    require_once "./Model/ProductsModel.php";
    require_once "./Model/CategorysModel.php";
    require_once "./View/LoginView.php";
    require_once "./Controller/LoginController.php";

    class CategorysController{

        private $productsView;
        private $categorysView;
        private $productosModel;
        private $categorysModel;
        private $loginView;
        private $loginControl;

        function __construct(){
            $this->productsView = new ProductsView();
            $this->categorysView = new CategorysView();
            $this->productosModel = new ProductsModel();
            $this->categorysModel = new CategorysModel();
            $this->loginView = new LoginView();
            $this->loginControl = new LoginController();
        }
        //HOME DE CATEGORIAS
        function HomeCategorys(){
            $categorys = $this->categorysModel->GetCategorys();
            $this->categorysView->ShowCategorys($categorys);
        }
        //INSERTO NUEVA CATEGORIA
        function InsertCategory(){
            $logueado = $this->loginControl->checkLoggedIn();
            if($logueado){
                if (isset($_POST['input_category'])) {
                    $category = $_POST['input_category'];
                    $this->categorysModel->InsertCategory($category);
                }
                $this->productsView->ShowLocation('admin');
            }else{
                $this->loginView->ShowLogin();
            }
        }
        //ELIMINO CATEGORIA POR ID
        function DeleteCategory($params = null){
            $logueado = $this->loginControl->checkLoggedIn();
            if($logueado){
                $category_id = $params[':ID'];
                $this->categorysModel->DeleteCategory($category_id);
                $this->productsView->ShowLocation('admin');
            }else{
                $this->loginView->ShowLogin();
            }
        }
        //LLAMA LA VISTA PARA EDITAR UNA CATEGORIA POR ID
        function EditCategory($params = null){
            $logueado = $this->loginControl->checkLoggedIn();
            if($logueado){
                $category_id = $params[':ID'];
                $category = $this->categorysModel->GetCategoryById($category_id);
                $this->categorysView->ShowEditCategory($category);
            }else{
                $this->loginView->ShowLogin();
            }
        }
        //LLAMA A ACTUALIZAR UNA CATEGORIA
        function UpdateCategory($params = null){
            $logueado = $this->loginControl->checkLoggedIn();
            if($logueado){
                $category_id = $params[':ID'];
                if (isset($_POST['edit_category'])) {
                    $category = $_POST['edit_category'];
                    $this->categorysModel->UpdateCategory($category,$category_id);
                }
                $this->productsView->ShowLocation('admin');
            }else{
                $this->loginView->ShowLogin();
            }
        }
    }
?>