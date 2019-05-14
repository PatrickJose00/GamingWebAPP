<?php

require_once(dirname(__FILE__).'/../DataAbstraction/DB.php');
require_once(dirname(__FILE__).'/../BL/product_categories.php');

class product_CategoriesDAL {

    public static function create($product_categories) {
        $db=DB::getInstance(); //ligaçao a BD
        $query="INSERT INTO product_categories (name) " . "VALUES(:name)"; //string da query
        
        $res=$db->query($query, array(
            ':name' => $product_categories->name )
        );
        if($res){
            $product_categories->id=$db->lastInsertId();
    }
return($res);
}
    public static function update($product_categories) {
        $db=DB::getInstance();
        $query="UPDATE product_categories SET name=:name "
                . "WHERE id=:id";
        $res=$db->query($query, array( 
            ':name' => $product_categories->name,
            ':id' => $product_categories->id,
            
                
                
                
                
                ));
        return($res);
            
            
    }

    public static function delete($product_categories) {
        $db=DB::getInstance();
        $query="DELETE FROM product_categories WHERE id=:id";
        $res=$db->query($query, array(
            ':id' => $product_categories->id
                ));
        return($res);
    }

    public static function getAll() {
        $db=DB::getInstance();
        $query="SELECT * FROM product_categories order by id";
        
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS,"product_categories");
        return($res);
    }

    public static function getByName($product_categories) {
        $db=DB::getInstance();
        $query="SELECT * FROM product_categories WHERE name=:name";

        $res=$db->query($query,array(':name'=>$product_categories)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"product_categories");
        $row=$res->fetch();
            if($row){
                $product_categories->copy($row);
            }
        $res->closeCursor();
        return($row);
    }
    
    public static function getById($product_categories) {
        $db=DB::getInstance();
        $query="SELECT * FROM product_categories WHERE id=:id";

        $res=$db->query($query,array(':id'=>$product_categories->id)
        );
        $res->setFetchMode(PDO::FETCH_CLASS,"product_categories");
        $row=$res->fetch();
            if($row){
                $product_categories->copy($row);
            }
        $res->closeCursor();
        return($row);
    }

    public static function getByCat($cat) {
        $db=DB::getInstance();
        $query="SELECT * FROM Product WHERE name=':name'";
        $res=$db->query($query,array(':name'=>$cat));
        $res->setFetchMode(PDO::FETCH_CLASS,"product_categories");
        $row=$res->fetch();
        var_dump($row);
        die;
        return($res);
    }

}

