<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/user.php');

class userDAL {

    public static function create($user) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO user (email,login,password,admin) " . "VALUES( :email, :login, SHA1(:password), :admin)"; //string da query
        
        $res=$db->query($query, array(
            ':email' =>$user->email, ':login' =>$user->login, ':password' =>$user->password, ':admin' =>$user->admin )
        );
        if($res){
            $user->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($user) {
        $db=DB::getInstance();
        $query="UPDATE user SET  email=:email, login=:login, password=:password, admin=:admin "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
           
            ':email' => $user->email,
            ':login' => $user->login,
            ':password' => $user->password,
             ':admin' => $user->admin,
              ':id' => $user->id,
            
          
                
                
                
                
                ));
        return($res);
            
            
    }

    public static function delete($user) {
        $db=DB::getInstance();
        $query="DELETE FROM user WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $user->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM user order by id ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"user");
        return($res);
    }
    
    public static function getById($user){
        $db = DB::getInstance();
        $query = "SELECT * FROM user WHERE id=:id";
        $res = $db->query($query, array(':id' => $user->id));
        $res->setFetchMode(PDO::FETCH_CLASS, "User");
        
        $row=$res->fetch();
        if($row){
            $user->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    
    
      public static function getByLoginAndPassword($user) {
        $db = DB::getInstance();
        $query = "SELECT * FROM user WHERE login=:login AND password=:password";
        $res = $db->query($query, array(':login' => $user->login, ':password' => $user->password));
        $res->setFetchMode(PDO::FETCH_CLASS, "User");
        
        $row=$res->fetch();
        if($row){
            $user->copy($row);
        }
        $res->closeCursor();
        
        return($row);        
    }
    
    public static function getByLogin($user){
        $db = DB::getInstance();
        $query = "SELECT * FROM user WHERE login=:login";
        $res=$db->query($query, array(':login' => $user->login));
        $res->setFetchMode(PDO::FETCH_CLASS, "User");
        
        $row=$res->fetch();
        if($row){
            $user->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    
    public static function AllDATA() {
        $db=DB::getInstance();
        $query=" select *
                FROM user inner join customer on user.id=customer.id
                 ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"user");
        return($res);
    }
   
    
     public static function encomendasUSER($user) {
        $db=DB::getInstance();
        $query="SELECT customer.name, product_orders.price, product_orders.quantity, product.name as ProductName
                from customer inner join user on customer.user_id=user.id
                inner join orders on user.id=orders.user_id
                inner join product_orders on orders.id=product_orders.orders_id
                inner join product on product_orders.product_id=product.id WHERE user.id=:id
                ";
        
         $res = $db->query($query, array(':id' => $user->id));
               
        $res->setFetchMode(PDO::FETCH_CLASS,"user");
        return($res);
    }
}
