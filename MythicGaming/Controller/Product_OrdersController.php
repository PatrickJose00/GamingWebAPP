

<?php //


require_once (dirname(__FILE__) . "/../BL/product_orders.php");
require_once (dirname(__FILE__) . "/../DAL/productOrdersDAL.php");
require_once (dirname(__FILE__). "/UserController.php");

class Product_OrdersControlller {

    public static function process($msg) {
        if (isset($_POST['criar-product_orders'])) {
            $msg = self::CreationProductOrders();
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-product_orders'){
            $msg = self::deleteProductOrders($msg);
        }else if(isset($_POST['update-product_orders'])){
            $msg = self::updateProductOrders($msg);
        }
        return($msg);
    }
    
    
    
    
     public static function CreationProductOrders() {

     
      if(UserController::isLoggedUserAdmin()) {
        
        $msg['error'][] = "Product already exist!";
        $msg['error'][] = "Name is required!";
        $msg['info'][] = "Product inserted";



    
      
      $price= $_POST['price'];
      $quantity = $_POST['quantity'];
    
       $orders_id = $_POST['orders_id'];
         $product_id = $_POST['product_id'];
      
    
     
          
    
    
     
      


        $product_orders = new product_orders();
        $product_orders->price = $price;
        $product_orders->quantity = $quantity;
           $product_orders->product_id = $product_id;
         $product_orders->orders_id = $orders_id;
    
        
    
     if (productOrdersDAL::create($product_orders)) {
           
                echo " price: $price";
                echo " quantity: $quantity";
               
        }
        
     } else {
            echo "Not allowed!";
        }
        return($msg);
    }
      
    
    public static function deleteProductOrders($msg) {
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $product_orders = new Product_orders();
                $product_orders->id = $_GET['id'];
                $product_orders->delete();
            }
        } else {
            echo "Not allowed!";
        }
        return ($msg);
    }
    
    
    
    public static function updateProductOrders($msg) {
        
        if(UserController::isLoggedUserAdmin()) {
   
      $price= $_POST['price'];
      $quantity = $_POST['quantity'];
     
  
      
      
   
    

        
        $product_orders = new product_orders();
        $product_orders->id = $_GET['id'];
        $product_orders->getById();
  
        
        
      
        $product_orders->price = $price;
        $product_orders->quantity = $quantity;
     

     
        

 

         
        $product_orders->update();
           
              
                 echo " price: $price";
                echo " quantity: $price";
        
 } else {
            echo "Not allowed!";
        }
        return($msg);
    }
    
}