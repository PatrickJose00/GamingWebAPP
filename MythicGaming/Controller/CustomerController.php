<?php 


require_once (dirname(__FILE__) . "/../BL/customer.php");
require_once (dirname(__FILE__) . "/../DAL/customerDAL.php");
require_once (dirname(__FILE__). "/UserController.php");






class CustomerController {

    public static function process($msg) {
        if (isset($_POST['criar-customer'])) {
            $msg = self::processCreation();
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-customer'){
            $msg = self::deleteCustomer($msg);
        }else if(isset($_POST['update1'])) {
            $msg = self::updateCustomer($msg);
        }
        return($msg);
    }
    
    
    
    public static function processCreation() {

     
      if(UserController::isLoggedUserAdmin()) {
        
    

    
      
      $name = $_POST['name'];
      $adress= $_POST['adress'];
      $city= $_POST['city'];
      $country = $_POST['country'];
       $postalcode= $_POST['postalcode'];
       $user_id= $_POST['user_id'];


        $customer = new customer();
        $customer ->name = $name;
        $customer->adress = $adress;
        $customer->city = $city;
        $customer->country = $country; 
        $customer->postalcode=$postalcode;
        $customer->user_id=$user_id;
      
        
    
     
            if ($customer->create()) {
                $row=$customer->getById();
                if($row){
                    
                    $customer->user_id=$row->id;
                    $customer->create();
                    $msg['info']='Customer created';
                }
            } else {
                
                echo "Not allowed!";
            }
            }
        
        
        return($msg);
    }
    
    
     public static function deleteCustomer($msg) {
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $customer = new customer();
                $customer->id = $_GET['id'];
                
                $customer->delete();
            }
        } else {
            echo "Not allowed!";
        }
        return ($msg);
    }
    
    
    public static function updateCustomer($msg) {
  
  	if(UserController::isLoggedUserAdmin()) {		
 
      $name = $_POST['name'];
      $adress= $_POST['adress'];
      $city= $_POST['city'];
      $country = $_POST['country'];
      $postalcode = $_POST['postalcode'];
      
        $customer = new customer();
        $customer->id = $_GET['id'];
        $customer->getById();
  
        
        
        $customer->name= $name;
        $customer->adress = $adress;
        $customer->city = $city;
        $customer->country = $country;
        $customer->postalcode= $postalcode;

         
        $customer->update();
           
              
                echo " name: $name";
                echo " adress: $adress";
                echo " city: $city";
                  echo " country: $country";
                     echo " postalcode: $postalcode";
                  
                
         } else {
                
               echo "Not allowed!"; 
            }

        return($msg);
    }
    
}