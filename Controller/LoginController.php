<?php
require_once "./View/LoginView.php";
require_once "./View/ProductsView.php";
require_once "./Model/LoginModel.php";
require_once "./Model/CategorysModel.php";
require_once "./Model/ProductsModel.php";

class LoginController{

    private $view;
    private $productView;
    private $model;
    private $modelProducts;
    private $categorysModel;

    function __construct(){
        $this->view= new LoginView();
        $this->productView = new ProductsView();
        $this->model= new LoginModel();
        $this->modelProducts = new ProductsModel();
        $this->categorysModel = new CategorysModel();;
    }
    //LLAMA AL LOGIN
    function Login(){
        $logueado = $this->checkLoggedIn();
        if($logueado){
            $this->productView->ShowLocation('admin');
        } else {
            $this->view->ShowLogin();
        }
    }
    //LLAMA AL LOGOUT
    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);
    }
    //VERIFICO SI ESTÁ LOGUEADO
    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['EMAIL'])){
            return false;
        } else return true;
    }  
    //VERIFICO MI USUARIO
    function VerifyUser(){
        $user = $_POST["input_username"];
        $pass = $_POST["input_password"];

        if(isset($user)){
            $userFromDB = $this->model->GetUser($user);
            if(isset($userFromDB) && $userFromDB){
                //if (password_verify($pass, $userFromDB->password)){
                if ($user == 'webadmin' && $pass == 'admin') {
                    session_start();
                    if(isset($_SESSION['LAST_ACTIVITY']) && (time()-$_SESSION['LAST_ACTIVITY']>1000)){
                        header("Location: ".LOGOUT);
                    }
                    $_SESSION["EMAIL"] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $this->productView->ShowLocation('admin');
                }else{
                    $this->view->ShowLogin("Contraseña incorrecta");
                }

            }else{
                $this->view->ShowLogin("Usuario no existente");
            }
        }
    }
    //MUESTRA LA PAGINA DONDE SE PUEDE MODIFICAR LOS PRODUCTOS Y CATEGORIAS (esta función es llamada action 'admin';)
    function ShowAdmin(){
        $logueado = $this->checkLoggedIn();
        if($logueado){
            $categorys = $this->categorysModel->GetCategorys();
            $products = $this->modelProducts->GetProducts();
            $this->view->ShowVerify($products, $categorys);
        }else{
            $this->view->ShowLogin();
        }
    }
}
?>