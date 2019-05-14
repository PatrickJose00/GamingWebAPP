<?php



require_once (dirname(__FILE__) . "/../BL/customer.php");
require_once (dirname(__FILE__) . "/../BL/user.php");
require_once (dirname(__FILE__) . "/../BL/product.php");
require_once (dirname(__FILE__) . "/../BL/orders.php");
require_once (dirname(__FILE__) . "/../BL/product_categories.php");
require_once (dirname(__FILE__) . "/../BL/product_orders.php");


class UserController {

    public static function process($msg) {
        if (isset($_POST['create-user'])) {
            $msg = self::processRegistration($msg);
         } else if (isset($_POST['criar-user'])) {
            $msg = self::createUser($msg);
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-user'){
            $msg = self::deleteUser($msg);
        }else if(isset($_POST['update-user'])){
            $msg = self::updateUser($msg);
        }else if (isset($_POST['criar-util'])) {
            $msg = self::UtiliRegist($msg);
    }else if(isset($_POST['update-userClient'])){
            $msg = self::updateUserOnClient($msg);
    }
        
        if(isset($_POST['process-login'])) {
            $msg = self::processLogin($msg);
            header("Location: index.php");
        } else if (isset($_GET['logout'])) {
           $msg = self::logout($msg);
           
       
        return($msg);
    }
    }
        
   
    private static function processRegistration($msg) {

        
        if(UserController::isLoggedUserAdmin()) {
        $msg['error'][] = "User already registered!";
        $msg['error'][] = "Name is required!";
        $msg['info'][] = "User registered";

      
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        

        $user = new User();
  
        $user->login = $login;
        $user->password = $password;
        $user->email = $email;
        $user->admin = 0;

        if ($user->getByLogin()) {
                       
            
        } else {
            if ($user->create($user)) {
         
                echo " Login: $login";
                echo " E-Mail: $email";
            }
        }
        } else {
            echo "Not allowed!";
        }
        return($msg);
  
    
}

    
    private static function processLogin($msg) {
        
        $login = $_POST['login'];
        $password = $_POST['login-password'];      
        
        $user = new User();
        $user->login = $login;
        $user->password = $password;
        
        if($user->getByLoginAndPassword()) {
            
            $msg['info'][] = "Login successful";
            self::setSessionUserId($user->id);
            
        } else {
            $msg['error'][] = "Login or password invalid";
        }
        
        return ($msg);
    }
    
    
    
    
    public static function setSessionUserId($userid) {
        $_SESSION['userid'] = $userid;
    }
    
    public static function getSessionUserId() {
        // $_SESSION é uma var. super gloabl que guarda em cookies a info dada
        return(isset($_SESSION['userid']) ? $_SESSION['userid'] : null);
    }

    public static function logout($msg) {
        
        if(self::getSessionUserId()) {
            $_SESSION = array();
            
            if(ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], 
                        $params["domain"], $params["secure"], $params["httponly"]);
            }
            session_destroy();
            $msg['info'][] = "User logged out";
        }
        
        return ($msg);
    }
    
    public static function getLoggedUser() {
        $userid = self::getSessionUserId();
        if($userid) {
            $user = new User();
            $user->id = $userid;
            $user->getById();
            
            return ($user);
        } else {
            return null;
        }        
    }

    public static function isLoggedUserAdmin() {
        $user = self::getLoggedUser();
        
        return ($user && $user->isAdmin());
    }
    
    public static function isUserAdmin() {
        $user = new User();
        $user = self::getLoggedUser();
        
        $res = false;
        if($user->admin == 1) {
            $res = true;
        }
        
        return ($res);
    }
    
    
    public static function CustomerRegist() {
        
        if(UserController::isLoggedUserAdmin()) {
        $name = $_POST['name'];  
        $adress = $_POST['adress'];  
        $city = $_POST['city'];  
        $country = $_POST['country'];  
        $postalcode = $_POST['postalcode'];  
       
        
        $user=new User();
        $user->email=$_POST['email'];
        $user->login=$_POST['login'];
        $user->password=$_POST['password'];
        $user->admin = 0;
        $customer = new customer();
        $customer->name = $name;
        $customer->adress = $adress;
        $customer->city = $city;
        $customer->country = $country;
        $customer->postalcode = $postalcode;
        
            if($user->getByLogin()) {
            
            $msg['info'][] = "ja existe um utilizador com esse login";
            } else {
            if ($user->create()) {
                $row=$user->getByLogin();
                if($row){
                    
                    $customer->user_id=$row->id;
                    $customer->create();
                    $msg['info']='user created';
                }
            }
        }
        } else {
            echo "Not allowed!";
        }
        
        return($msg);
    }
    
    
    
    private static function createUser($msg) {

      

      

        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
      
        
 if(UserController::isLoggedUserAdmin()) {
        
        $user = new User();
     
        $user->login = $login;
        $user->password = $password;
        $user->email = $email;
        $user->admin = 0;


        if (userDAL::create($user)) {
           
              
         
               echo "<span class='info'>" . 'User Criado Com Sucesso' . "</span>";
               
                
        }

        return($msg);
     } else {
    echo "Not allowed!";
    
}

}

public static function updateUser($msg) {
  
  	  if(UserController::isLoggedUserAdmin()) {
            
      		
 
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];

    
     
     
        
        $user = new user();
        $user->id = $_GET['id'];
        $user->getById();
        $user->admin = $admin;
        $user->email = $email;
        $user->password = $password;
        $user->login = $login;
        $user->update();
           
        if($user->update()) {
            
            
          echo "<span class='info'>" . 'Dados Actualizados Com Sucesso' . "</span>";
            } else{
                echo "<span class='info'>" . 'Erro' . "</span>";
            }
          
                echo " email: $email";
                echo " login: $login";
               echo " password: $login";
                echo " login: $admin";
                
        
                    } else {
                        echo "Not allowed!";
    
                           }

        return($msg);
     } 
     
     
       
     
      public static function deleteUser($msg) {
          
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $user = new user();
                $user->id = $_GET['id'];
               
                $user->delete();
                
            }
        } else {
           echo "user not deleted";
        }
        return ($msg);
    }
    
    
   
     public static function UtiliRegist() {
         
         
      
       
        
        $msg['error'][] = "User already exist!";
        $msg['error'][] = "Name is required!";
        $msg['info'][] = "User Criado";



    
        $name = $_POST['name'];  
        $adress = $_POST['adress'];  
        $city = $_POST['city'];  
        $country = $_POST['country'];  
        $postalcode = $_POST['postalcode'];  
         $postalcode = $_POST['postalcode'];  
       


         $user=new User();
        $user->admin = 0;
        $user->email=$_POST['email'];
        $user->login=$_POST['login'];
        $user->password=$_POST['password'];
        $customer = new customer();
        $customer->name = $name;
        $customer->adress = $adress;
        $customer->city = $city;
        $customer->country = $country;
        $customer->postalcode = $postalcode;
         $customer->postalcode = $postalcode;
        
        
    
         if($user->getByLogin()) {
            
            $msg['info'][] = "ja existe um utilizador com esse login";
            } else {
            if ($user->create()) {
                $row=$user->getByLogin();
                if($row){
                    
                    $customer->user_id=$row->id;
                    $customer->create();
                    $msg['info']='user created';
                }
                

                
        }

        return($msg);
    } 
        
     }   
     
     
     public static function updateUserOnClient($msg) {
  
  	  
            
      		
 
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
            
      $name = $_POST['name'];
      $adress= $_POST['adress'];
      $city= $_POST['city'];
      $country = $_POST['country'];
       $postalcode= $_POST['postalcode'];
    
     

    
     
    
        $id=UserController::getSessionUserId();
        $user = new user();
        $user->id =$id;
        $user->getById();
        $customer = new customer();
        $customer->id=$id;
        $customer->getById();
    

     
        $user->email = $email;
        $user->password = $password;
        $user->login = $login;
           $customer ->name = $name;
        $customer->adress = $adress;
        $customer->city = $city;
        $customer->country = $country; 
        $customer->postalcode=$postalcode;
      if($user && $customer->update()) {
            
            
          echo "<span class='info'>" . 'Dados Actualizados Com Sucesso' . "</span>";
            } else{
                echo "<span class='info'>" . 'Erro' . "</span>";
            }

        $user->update();
        $customer->update();
           
          
                
                    
                
        
 

        return($msg);
  
    
     } 
     
         
}




