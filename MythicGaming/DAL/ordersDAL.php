<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/orders.php');
require_once(dirname(__FILE__).'/../BL/product_orders.php');
require_once(dirname(__FILE__).'/../BL/customer.php');
require_once(dirname(__FILE__).'/../BL/product.php');
require_once(dirname(__FILE__).'/../BL/user.php');


class ordersDAL {

    public static function create($orders) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO orders(status,date,transport,payment,quantity) " . "VALUES(:status, :date , :transport , :payment, :quantity)"; //string da query
        
        $res=$db->query($query, array(
            ':status' => $orders->status, ':date' =>$orders->date, ':transport' =>$orders->transport, ':payment' =>$orders->payment, ':quantity' =>$orders->quantity  )
        );
        if($res){
            $orders->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($orders) {
        $db=DB::getInstance();
        $query="UPDATE orders SET id=:id, status=:status, date=:date, transport=:transport, payment=:payment, quantity=:quantity "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
            ':status' => $orders->status,
            ':date' => $orders->date,
            ':id' => $orders->id,
            ':transport' => $orders->transport,
             ':payment' => $orders->payment,
             ':quantity' => $orders->quantity,
            
            
            
                
                
                
                ));
        return($res);
            
            
    }

    public static function delete($orders) {
        $db=DB::getInstance();
        $query="DELETE FROM orders WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $orders->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM orders order by id ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"orders");
        return($res);
    }

    public static function getByName($orders) {
        $db=DB::getInstance();
        $query="SELECT * FROM orders WHERE name=:name";

        $res=$db->query($query,array(':name'=>$orders->name)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"orders");
        $row=$res->fetch();
            if($row){
                $orders->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getById($orders) {
        $db=DB::getInstance();
        $query="SELECT * FROM orders WHERE id=:id";

        $res=$db->query($query,array(':id'=>$orders->id)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"orders");
        $row=$res->fetch();
            if($row){
                $orders->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    
    
     public static function LucroBruto($orders) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO orders(status,date,transport,payment, customer_id) " . "VALUES(:status, :date , :transport , :payment, :customer_id)"; //string da query
        
        $res=$db->query($query, array(
            ':status' => $orders->status, ':date' =>$orders->date, ':transport' =>$orders->transport, ':payment' =>$orders->payment, ':customer_id' =>$orders->customer_id )
        );
        if($res){
            $orders->id=$db->lastInsertId();
    }
return($res);
}


            

   public static function encomendas() {
        $db=DB::getInstance();
        $query="select product.id,  customer.name as CustomerName, product.name,product.price,orders.quantity
                from customer inner join
                user on customer.id=user.id
                inner join 
                orders on user.id=orders.user_id
                inner join
                product_orders on orders.user_id=product_orders.orders_id
                inner join
                product on product_orders.id=product.id;
                ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"orders");
        return($res);
    }

        public static function total() {
        $db=DB::getInstance();
        $query=" select sum(product.price) as total
            from product; ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"orders");
        return($res);
    }
      
    
   
}

