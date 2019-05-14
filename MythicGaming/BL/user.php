<?php
require_once(dirname(__FILE__).'/../DAL/userDAL.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user {

    public $id;
    public $email;
    public $password;
    public $login;
    public $admin;
    
    public function __construct(){
      
//        $this->admin=false;
    }
    
    public function copy($item){
   
        $this->id=$item->id;
        $this->email=$item->email;
        $this->password=$item->password;
        $this->login=$item->login;
        $this->admin=$item->admin;
    }
    
    
    public function printAttr(){
        
        echo $this->id;
        echo "<br/>";
        echo $this->login;
        echo "<br/>";
        echo $this->password;
        echo "<br/>";
        echo $this->email;
        echo "<br/>";
        echo $this->admin;
        echo "<br/>";
    }
    
     public function create(){
        $res=false;
        if(!userDAL::getById($this)){
            $res=userDAL::create($this);
        }
        return($res);
}

public function update(){
        
        $res=userDAL::update($this);
        return($res);
        
        
    }
    
    public function delete(){
        $res=userDAL::delete($this);
        return($res);
    }
    
        public  function getById(){
            return (userDAL::getById($this));
            
        }
    
    public function getByName(){
        return (userDAL::getByName($this));
    }
    
    public function getByLogin(){
        return(userDAL::getByLogin($this));
    }
    
    public function getByLoginAndPassword() {
        return (userDAL::getByLoginAndPassword($this));
    }
    
    public static function AllDATA(){
        return (userDAL::AllDATA());
    }
    
    public function getAll(){
        
        return(userDAL::getAll());
        
    }
    
    public function createAdmin() {
        $this->email="admin@localhost";
        $this->login="admin";
        $this->password="admin";
        $this->admin=1;
        
        if(!$this->getByLogin()) {
            $this->create();
        }
    }
    
    public function isAdmin() {
        return ($this->admin);
    }
    
     public function encomendasUSER($user){
        return (userDAL::encomendasUSER($user));
    }
}

