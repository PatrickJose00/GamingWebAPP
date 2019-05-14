<?php

require_once(dirname(__FILE__).'/../DAL/productOrdersDAL.php');

Class product_orders {
    const CART=0;
    const SUBMITTED=1;
    const PROCESSED=2;
    
    public $id;
    public $price;
    public $quantity;
   
    
   public $product_id;
   public $orders_id;
    
    

    
    
    
    
    
    
    public function copy($item){
        $this->id=$item->id;
        $this->price=$item->price;
        $this->quantity=$item->quantity;
      
         $this->product_id=$item->product_id;
          $this->orders_id=$item->orders_id;
        
        
    
    }
    
    public function create(){
        $res=false;
        if(!productOrdersDAL::getById($this)){
            $res=productOrdersDAL::create($this);
        }
        return($res);
}

public function update(){
        
        $res=productOrdersDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=productOrdersDAL::delete($this);
        return($res);
    }


       public static function getAll(){
        return(productOrdersDAL::getAll());
    }
    
    public static function getSome(){
        return(productOrdersDAL::getSome());
    }
    
        public  function getById(){
            return (productOrdersDAL::getById($this));
            
        }
    
    public function getByName(){
        return (productOrdersDAL::getByName($this));
    }
   
}