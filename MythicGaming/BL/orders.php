<?php
require_once(dirname(__FILE__).'/../DAL/ordersDAL.php');

Class orders {
    const CART=0;
    const SUBMITTED=1;
    const PROCESSED=2;
    
    public $id;
    public $created_at;
    public $date;
    public $status;
    public $transport;
    public $payment;
    public $quantity;
    
    
    

    
    
    public function copy($item){
        $this->id=$item->id;
        $this->created_at=$item->created_at;
        $this->date=$item->date;
        $this->status=$item->status;
         $this->date=$item->date;
          $this->transport=$item->transport;
           $this->payment=$item->payment;
            $this->quantity=$item->quantity;
        
        
    }
    
    public function create(){
        $res=false;
        if(!ordersDAL::getById($this)){
            $res=ordersDAL::create($this);
        }
        return($res);
}

public function update(){
        
        $res=ordersDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=ordersDAL::delete($this);
        return($res);
    }


       public static function getAll(){
        return(ordersDAL::getAll());
    }
    
   
    
    
    public  function getById(){
            return (ordersDAL::getById($this));
            
        }
        
     
    public function getByName(){
        return (ordersDAL::getByName($this));
    }
    
    public function encomendas(){
        return (ordersDAL::encomendas());
    }
    
     public function total(){
        return (OrdersDAL::total());
    }
    
    
    
}