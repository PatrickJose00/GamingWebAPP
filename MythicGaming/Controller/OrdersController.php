<?php

require_once (dirname(__FILE__) . "/../BL/orders.php");
require_once (dirname(__FILE__) . "/../DAL/ordersDAL.php");



class OrdersControlller {

    public static function process($msg) {
        if (isset($_POST['create-orders'])) {
            $msg = self::processOrders($msg);
    } else if(isset($_GET['action']) && $_GET['action'] == 'delete-orders'){
            $msg = self::deleteOrder($msg);
        }else if(isset($_POST['update-orders'])) {
            $msg = self::updateOrder($msg);
        }
        return($msg);
    }
    
    
    private static function processOrders($msg) {
        if(UserController::isLoggedUserAdmin()) {
      

        $date = $_POST['date']; 
        $status = $_POST['status'];
        $transport = $_POST['transport'];
        $payment = $_POST['payment'];
//        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
       
        

        $orders = new Orders();
        $orders->status = $status;
         $orders->date = $date;
        $orders->transport = $transport;
        $orders->payment = $payment;
        $orders->quantity = $quantity;
        $user = new User();
        
                if ($orders->create()) {
                $row=$user->getByLogin();
                if($row){
                    
                    $orders->user_id=$row->id;
                    $orders->create();
                    $msg['info']='user created';
                }
            }
        } else {
    echo "Not allowed!";
    }
    }
        
 public static function deleteOrder($msg) {
        if(UserController::isLoggedUserAdmin()) {
            if(isset($_GET['id'])) {
                $orders = new Orders();
                $orders->id = $_GET['id'];
                $orders->delete();
            }
        } else {
            echo "Not allowed!";
        }
        return ($msg);
    }
    
  
public static function updateOrder($msg) {
  
  	if(UserController::isLoggedUserAdmin()) {		
        $status = $_POST['status'];
        $date =$_POST['date'];

        $transport = $_POST['transport'];
        $payment = $_POST['payment'];
        $quantity = $_POST['quantity'];
     
        
        $orders = new orders();
        $orders->id = $_GET['id'];
        $orders->getById();
  
        
        
        $orders->date= $date;
        $orders->status = $status;
        $orders->transport = $transport;
          $orders->payment = $payment;
           $orders->quantity = $quantity;
        

         
        $orders->update();
           
              
                echo " status: $status";
                echo " trasnport: $transport";
                echo " payment: $payment";
                
        } else {
            echo "Not allowed!";
        }
     

        return($msg);
    }
    





}