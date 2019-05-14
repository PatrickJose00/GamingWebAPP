<?php
require_once(dirname(__FILE__).'/../DAL/customerDAL.php');

Class customer {
   
    
    public $id;
    public $name;
    public $adress;
    public $city;
    public $country;
    public $postalcode;
    public $created_at;
    
    public $user_id;
    
    
   
    
    
    public function copy($item){
        $this->id=$item->id;
        $this->name=$item->name;
        $this->adress=$item->adress;
        $this->city=$item->city;
        $this->country=$item->country;
        $this->postalcode=$item->postalcode;
        $this->created_at=$item->created_at;
        $this->user_id=$item->user_id;
        
        
        
    }
    
    public function create(){
        $res=false;
        if(!customerDAL::getByName($this)){
            $res=customerDAL::create($this);
        }
        return($res);
}

public function update(){
        
        $res=customerDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=customerDAL::delete($this);
        return($res);
    }


       public static function getAll(){
        return(customerDAL::getAll());
    }
    
       public static function getname(){
        return(customerDAL::getname());
    }
    
    public  function getById(){
            return (customerDAL::getById($this));
            
        }
    
    public function getByName(){
        return (customerDAL::getByName($this));
    }
    
    public function getCustomerByUser(){
        return (CustomerDAL::getCustomerByUser($this));
    }
    

}