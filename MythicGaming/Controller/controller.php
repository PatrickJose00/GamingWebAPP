<?php

require_once (dirname(__FILE__). "/UserController.php");
require_once (dirname(__FILE__). "/../BL/User.php");
require_once (dirname(__FILE__). "/../BL/product.php");
require_once (dirname(__FILE__). "/ProductController.php");
require_once (dirname(__FILE__). "/OrdersController.php");
require_once (dirname(__FILE__). "/CustomerController.php");
require_once (dirname(__FILE__). "/Product_OrdersController.php");
require_once (dirname(__FILE__). "/Product_CategoriesController.php");




class Controller {
    
    public static function process(){
    
        $user = new User();
        $user->createAdmin(); // Create Admin user if not exists
        
        session_start();
        $msg = array();
        $msg = ProductControlller::process($msg);
        $msg = UserController::process($msg);
        $msg = OrdersControlller::process($msg);
        $msg = CustomerController::process($msg);
        $msg = Product_OrdersControlller::process($msg);
        $msg = Product_CategoriesController::process($msg);
        
        return($msg);
    }

public static function mainMenu() {
        $menu = array(
            array(
                'text' => 'Home',
                'url' => 'index.php',
                'visible' => true           //User::isAdmin()
            ),
            array(
                'text' => 'Novidades',
                'url' => 'index.php?page=listaProdutos.php&cat=news',
                'visible' => true
            ),
            array(
                'text' => 'Promoções',
                'url' => 'index.php?page=listaProdutos.php&cat=promo',
                'visible' => true
            ),
            array(
                'text' => 'Login',
                'url' => 'index.php?page=user/formlogin.php',
                'visible' => '!UserController::getSessionUserId()'
            ),
            array(
                'text' => 'Log Out',
                'url' => 'index.php?logout',
                'visible' => 'UserController::getSessionUserId()'
            ),
            array(
                'text' => 'Area de Cliente',
                'url' => 'index.php?page=areaCliente.php',
                'visible' => 'UserController::getSessionUserId() && !UserController::isLoggedUserAdmin()'
           ),
            array(
               'text' => 'Area de Admin',
                'url' => 'index.php?page=areaAdmin.php',
               'visible' => 'UserController::isLoggedUserAdmin()'
           )
           
        );
        return $menu;
    }
    

    
    public static function mainController(){
        $msg=UserController::CustomerRegist();
      
    }
    
    
}