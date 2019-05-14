<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/Product.php');

class productDAL {

    public static function create($product) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO product (name,description,price,stock,image,product_categories_id) " . "VALUES(:name,:description, :price, :stock,:image,:product_categories_id)"; //string da query
        
        $res=$db->query($query, array(
            ':name' => $product->name, ':price' =>$product->price, ':stock' =>$product->stock, ':description' =>$product->description, ':image' =>$product->image, ':product_categories_id' =>$product->product_categories_id )
        );
        if($res){
            $product->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($product) {
        $db=DB::getInstance();
        $query="UPDATE product SET name=:name, description=:description, price=:price, stock=:stock "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
          ':id' => $product->id,
            ':name' => $product->name,
            ':description' => $product->description,
            ':price' => $product->price,
             ':stock' => $product->stock,
//             
          
           
            
                
                
                ));
        return($res);
            
            
    }

    public static function delete($product) {
        $db=DB::getInstance();
        $query="DELETE  FROM product WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $product->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM product order by id ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"Product");
        return($res);
    }

    public static function getByName($product) {
        $db=DB::getInstance();
        $query="SELECT * FROM product WHERE name=:name";

        $res=$db->query($query,array(':name'=>$product->name)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"product");
        $row=$res->fetch();
            if($row){
                $product->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getByCat($cat) {
        $db = DB::getInstance();
        $query = "SELECT product.* FROM product join product_categories on product.product_categories_id=product_categories.id where product_categories.name=:name";
        $res=$db->query($query, [':name' => $cat]);
        $res->setFetchMode(PDO::FETCH_CLASS,"product");

        return($res);
    }
    
    public static function getById($id){
        $db = DB::getInstance();
        $query = "SELECT * FROM product WHERE id=:id";
        $res = $db->query($query, array(':id' => $id));
        $res->setFetchMode(PDO::FETCH_CLASS, "product");
        
        $row=$res->fetch();
//        if($row){
//            $product->copy($row);
//        }
        $res->closeCursor();
        return($row);
    }
    
    
      public static function getByIdd($product){
        $db = DB::getInstance();
        $query = "SELECT * FROM product WHERE id=:id";
        $res = $db->query($query, array(':id'=>$product->id));
        $res->setFetchMode(PDO::FETCH_CLASS, "product");
        
        $row=$res->fetch();
        if($row){
            $product->copy($row);
    }
        $res->closeCursor();
        return($row);
    }
    
    
     public static function ProductCat() {
         if(UserController::isLoggedUserAdmin()) {
        $db=DB::getInstance();
        $query=" select  product.id ,product.name as NameProduct, product_categories.name
                FROM product_categories inner join  product on product_categories.id=product.product_categories_id
              ";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"product");
        return($res);
    }
     else{ 
         echo "not alloawed";
     }
     
}
}

