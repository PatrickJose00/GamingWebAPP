<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/customer.php');

class customerDAL {

    public static function create($customer) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO customer(name,adress,city,country,postalcode,user_id) " . "VALUES(:name, :adress, :city, :country, :postalcode, :user_id)"; //string da query
        
        $res=$db->query($query, array(
            ':name' => $customer->name, ':adress' =>$customer->adress, ':city' =>$customer->city, ':country' =>$customer->country, ':postalcode' =>$customer->postalcode, ':user_id'=>$customer->user_id )
        );
        if($res){
            $customer->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($customer) {
        $db=DB::getInstance();
        $query="UPDATE customer SET name=:name, adress=:adress, city=:city, country=:country, postalcode=:postalcode "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
            ':name' => $customer->name,
            ':adress' => $customer->adress,
            ':city' => $customer->city,
            ':country' => $customer->country,
            ':postalcode' => $customer->postalcode,
            ':id' => $customer->id,
                
                
                
                
                ));
        return($res);
            
            
    }

    public static function delete($customer) {
        $db=DB::getInstance();
        $query="DELETE FROM customer WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $customer->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM customer order by id ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"customer");
        return($res);
    }
    
     public static function getName() {
        $db=DB::getInstance();
        $query="SELECT name FROM customer
                inner join user on user.id=customer.user_id
                inner join orders on user.id=orders.user_id
                where customer.user_id=orders.user_id";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"customer");
        return($res);
    }

    public static function getByName($customer) {
        $db=DB::getInstance();
        $query="SELECT * FROM customer WHERE name=:name";

        $res=$db->query($query,array(':name'=>$customer->name)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"customer");
        $row=$res->fetch();
            if($row){
                $customer->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getById($customer) {
        $db=DB::getInstance();
        $query="SELECT * FROM customer WHERE id=:id";

        $res=$db->query($query,array(':id'=>$customer->id)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"customer");
        $row=$res->fetch();
            if($row){
                $customer->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getCustomerByUser($customer){
        $db = DB::getInstance();
        $query = "SELECT * FROM customer,user WHERE customer.user_id=user.id";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Customer");
        
        $row=$res->fetch();
        if($row){
            $customer->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
}

