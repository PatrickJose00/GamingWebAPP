<?php //

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once (dirname(__FILE__) . "/../BL/product.php");
require_once (dirname(__FILE__) . "/../DAL/product_categoriesDAL.php");
require_once (dirname(__FILE__). "/UserController.php");

class ProductControlller {

    public static function process($msg) {
        if (isset($_POST['criar-produto'])) {
            $msg = self::CreationProduct();
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-product'){
            $msg = self::deleteProduct($msg);
        }else if(isset($_POST['update-product'])){
            $msg = self::updateProduct($msg);
        }
        return($msg);
    }

    
    public static function CreationProduct() {

     
      if(UserController::isLoggedUserAdmin()) {	
        
        $msg['error'][] = "Product already exist!";
        $msg['error'][] = "Name is required!";
        $msg['info'][] = "Product inserted";



    
      
      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $stock = $_POST['stock'];
     
          
    
      $product_categories_id = $_POST['product_categories_id'];
     
      
   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
 $imgData = file_get_contents($_FILES['image']['tmp_name']);
 $sizeData = getimagesize($_FILES['image']['tmp_name']);
 $image = $imgData;
 
}

        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->stock = $stock; 
        $product->image = $image;
        $product->product_categories_id = $product_categories_id;
        
          
          
        
       if (productDAL::create($product)) {
           
                echo " name: $name";
                echo " preco: $price";
                echo " descricao: $description";
                echo " stock: $stock";
                
        }
} else {
            echo "Not allowed!";
        }
        return($msg);
    }
      
  

    
    
      
 

     public static function deleteProduct($msg) {
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $product = new Product();
                $product->id = $_GET['id'];
                $product->delete();
            }
        } else {
            echo "Not allowed!";
        }
        return ($msg);
    }
    
    public static function updateProduct($msg) {
        
         if(UserController::isLoggedUserAdmin()) {	
   
        $name =$_POST['name'];
        $description =$_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
   
      
        
 

        
        $product = new product();
        $product->id = $_GET['id'];
        $product->getByIdd();
  
        
        
      
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->stock = $stock;

     
        

 

         
        $product->update();
           
              
                echo " name: $name";
                echo " price: $price";
                echo " stock: $stock";
                
         } else {
            echo "Not allowed!";
        }

        return($msg);
    }
    
            
    public static function getSessionProductId() {
        // $_SESSION é uma var. super gloabl que guarda em cookies a info dada
        return(isset($_SESSION['productid']) ? $_SESSION['productid'] : null);
    } 
                
      public static function setSessionProductId($productid) {
        $_SESSION['productid'] = $productid;
    }
    
    public static function getSessionProductIdList() {
        return(isset($_SESSION['productid_list']) ? $_SESSION['productid_list'] : null);
    }
    
    public static function getSessionProductIdListIndex() {
        return(isset($_SESSION['productid_list']) ? array_keys($_SESSION['productid_list']) : null);
    }
    
    public static function setSessionProductIdList($productid) {
        if( !isset($_SESSION['productid_list']) && empty($_SESSION['productid_list']) ){
            $_SESSION['productid_list'] = array();
        }
       
        array_push($_SESSION['productid_list'], $productid);
        return $key = end(array_keys($_SESSION['productid_list']));
    }
    
    public static function deleteSessionProductIdList($productid, $index) {
        unset($_SESSION['productid_list'][$index]);
        //$_SESSION['productid_list'] = array_diff($_SESSION['productid_list'], array( $productid));
    }
}
