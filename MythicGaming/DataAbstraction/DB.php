<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Luís
 */
class DB {

    private $conn;
    private static $instance = null;

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=mydb;charset=UTF8;",
            "root","");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return(self::$instance);
    }

    public function query($q, $parms = array()) {
        $res = $this->conn->prepare($q);
        if ($res) {
            $res->execute($parms);
        }
        return ($res);
       
    }

    public function lastInsertId() {
        return($this->conn->lastInsertId());
    }

    public function __destruct() {
        if (self::$instance != null) {
            self::$instance = null;
            $this->conn = null;
        }
    }

}
?>