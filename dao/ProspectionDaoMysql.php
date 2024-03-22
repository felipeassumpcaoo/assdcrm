<?php

require_once 'models/Prospection.php';

class ProspectionDaoMysql implements ProspectionDAO {
    private $pdo; 
    
    public function __construct(PDO $driver){
     $this->pdo = $driver;
        
    }

    public function add( Prospection $p){

    }

    public function findAll(){
      $array = [];

      return $array;
    }

    public function findById($id){

    }

    public function update(Prospection $p){

    }

    public function delete($id){

    }
}