



<?php //



require_once (dirname(__FILE__) . "/../BL/product_categories.php");
require_once (dirname(__FILE__) . "/../DAL/product_categoriesDAL.php");
require_once (dirname(__FILE__). "/UserController.php");

class Product_CategoriesController {

    public static function process($msg) {
        if (isset($_POST['create-product-categories'])) {
            $msg = self::CreatProductCategories($msg);
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-product-categories'){
            $msg = self::deleteProductCategories($msg);
        }else if(isset($_POST['update-product-categories'])){
            $msg = self::updateProductCategories($msg);
        }
        return($msg);
    }

    
    public static function CreatProductCategories($msg) {
 if(UserController::isLoggedUserAdmin()) {
        $name = $_POST['name'];
  
        $product_categories = new product_categories();
        $product_categories->name = $name;
       
  
       if (product_categoriesDAL::create($product_categories)) {
           
                echo " name: $name";
              
                
        }
 } else {
            echo "Not allowed!";
        }
        return($msg);
    }
    
    public static function deleteProductCategories($msg) {
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $product_categories = new product_categories();
                $product_categories->id = $_GET['id'];
                $product_categories->delete();
            }
        } else {
            echo "Not allowed!";
        }
        return ($msg);
    }
    
    public static function updateProductCategories($msg) {
        
        
   if(UserController::isLoggedUserAdmin()) {
       
   
        $name =$_POST['name'];
   
      
        $product_categories = new product_categories();
        $product_categories->id = $_GET['id'];
        $product_categories->getById();

        $product_categories->name = $name;
        $product_categories->update();
           
              
                echo " name: $name";

                } else {
            echo "Not allowed!";
        }
        return($msg);
    }
}