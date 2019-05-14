<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/product_orders.php');

class productOrdersDAL {

    public static function create($product_orders) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO product_orders (quantity,price,orders_id, product_id ) " . "VALUES(:quantity, :price ,:orders_id ,:product_id )"; //string da query
        
        $res=$db->query($query, array(
            ':quantity' => $product_orders->quantity, ':price' =>$product_orders->price, ':orders_id' => $product_orders->orders_id, ':product_id' => $product_orders->product_id  )
        );
        if($res){
            $product_orders->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($product_orders) {
        $db=DB::getInstance();
        $query="UPDATE product_orders SET quantity=:quantity, price=:price "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
            ':quantity' => $product_orders->quantity,
            ':price' => $product_orders->price,
            ':id' => $product_orders->id,
              
                ));
        return($res);
            
            
    }

    public static function delete($product_orders) {
        $db=DB::getInstance();
        $query="DELETE FROM product_orders WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $product_orders->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM product_orders order by id ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"product_orders");
        return($res);
    }

    public static function getByName($product_orders) {
        $db=DB::getInstance();
        $query="SELECT * FROM product_orders WHERE name=:name";

        $res=$db->query($query,array(':name'=>$product_orders->name)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"product_orders");
        $row=$res->fetch();
            if($row){
                $product_orders->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getById($product_orders) {
        $db=DB::getInstance();
        $query="SELECT * FROM product_orders WHERE id=:id";

        $res=$db->query($query,array(':id'=>$product_orders->id)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"product_orders");
        $row=$res->fetch();
            if($row){
                $product_orders->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
      public static function getProducts($cat) {
        $db = DB::getInstance();
        $query = "SELECT product.name,product.price,orders.quantity
from product
inner join  product_orders on product_orders.product_id=product.id
inner join  orders on orders.id=product_orders.orders_id
inner join  customer on customer.id=orders.customer_id";
        $res=$db->query($query, [':name' => $cat]);
        $res->setFetchMode(PDO::FETCH_CLASS,"product");
      }
      
      public static function getSome() {
        $db=DB::getInstance();
        $query="SELECT product_orders.id, product_orders.price, quantity, product.name FROM 
product inner join product_orders on product.id=product_orders.product_id
order by id; ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"product_orders");
        return($res);
    }
      
}
