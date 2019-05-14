<?php

require_once(dirname(__FILE__).'/../DAL/product_categoriesDAL.php');

Class product_categories {
   
    public $id;
    public $name;
 
    
   
    
    
    
    
    
    
    public function copy($item){
        $this->id=$item->id;
        $this->name=$item->name;
       
        
       
        
    }
    
    public function create(){
        $res=false;
        if(!product_categoriesDAL::getByName($this)){
            $res=product_categoriesDAL::create($this);
        }
        return($res);
}

public function construct($name){
    $this->name=$name;
}

public function update(){
        
        $res=product_categoriesDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=product_categoriesDAL::delete($this);
        return($res);
    }


       public static function getAll(){
        return(product_categoriesDAL::getAll());
    }
    
       public  function getById(){
            return (product_categoriesDAL::getById($this));
            
        }
    
    public function getByName(){
        return (product_categoriesDAL::getByName($this));
    }
    
    public static function getByCat($cat){
        return (productDAL::getByCat($cat));
    }
}