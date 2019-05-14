<?php

require_once(dirname(__FILE__).'/../DAL/productDAL.php');
require_once('product_categories.php');

Class product {
    public $id;
    public $name;
    public $image;
    public $price;
    public $stock;
    public $created_at;
    public $description;
   
    public $product_categories_id;

    public function copy($item){
        $this->id=$item->id;
        $this->name=$item->name;
        $this->image=$item->image;
        $this->price=$item->price;
        $this->stock=$item->stock;
          $this->description=$item->description;
        $this->created_at=$item->created_at;
        
        $this->product_categories_id=$item->product_categories_id;

    }
    
    public function create(){
        $res=false;
        if(!productDAL::getByName($this)){
            $res=productDAL::create($this);
        }
        return($res);
    }

//  public function __construct($id, $name, $image, $price, $stock, $product_categories_id){
//        $this->id=$id;
//        $this->image=$image;
//        $this->name=$name;
//        $this->price=$price;
//        $this->stock=$stock;
//        $this->product_categories_id=$product_categories_id;
//  }
    
//public function __construct($cat){
//    $res=  productDAL::getByCat($this);
//    $prod=$res->fetch_assoc();
//   $this->product_categories_id=$prod->id;
//}

public function update(){
        
        $res=productDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=productDAL::delete($this);
        return($res);
    }


    public static function getAll(){
        return(productDAL::getAll());
    }
    
    public function getById($id){
        return (productDAL::getById($id));
    }
    
     public function getByIdd(){
        return (productDAL::getByIdd($this));
    }
    
    public function ProductCat(){
        return (productDAL::ProductCat());
    }
    
    public function getByName($name){
        return (productDAL::getByName($name));
    }
    public static function getByCat($cat){
        return (productDAL::getByCat($cat));
    }
}