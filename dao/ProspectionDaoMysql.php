<?php

require_once 'interfaces/ProspectionDAOInterface.php';
require_once '../models/Prospection.php';

class ProspectionDaoMysql implements ProspectionDAO {
    private $pdo; 
    
    public function __construct(PDO $driver){
     $this->pdo = $driver;
        
    }

    public function add( Prospection $p){

    }

    public function findAll(){
      $array = [];
      
      //Fazendo a consulta no banco de dados;
      $sql = $this->pdo->query("SELECT * FROM prospection");
      if($sql->rowCount() >  0) {
        $data = $sql->fetchAll();
         
        foreach($data as $list) {
          $p = new Prospection();
          $p->setCompanies($list['companies']);
          $p->setName($list['name']);
          $p->setEmail($list['email']);
          $p->setStatus($list['status']);

          $array[] = $p;
        }
      }

      return $array;
    }

    public function findById($id){

    }

    public function update(Prospection $p){

    }

    public function delete($id){

    }
}