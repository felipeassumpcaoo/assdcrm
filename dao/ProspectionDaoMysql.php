<?php
require_once 'interfaces/ProspectionDAOInterface.php';
require_once __DIR__ . '/../models/Prospection.php';

class ProspectionDaoMysql implements ProspectionDAO {
    private $pdo; 
    
    public function __construct(PDO $driver){
     $this->pdo = $driver;
        
    }

    public function add( Prospection $p){
     $sql = $this->pdo->prepare("INSERT INTO prospection (companies, name, email, status) VALUES (:companies, :name, :email, :status)");
     $sql->bindValue(':companies', $p->getCompanies());
     $sql->bindValue(':name', $p->getName());
     $sql->bindValue(':email', $p->getEmail());
     $sql->bindValue(':status', $p->getStatus());
     $sql->execute();

     $p->setId( $this->pdo->lastInsertId() );
     return $p;

    }

    public function findAll(){
      $array = [];
      
      //Fazendo a consulta no banco de dados;
      $sql = $this->pdo->query("SELECT * FROM prospection");
      if($sql->rowCount() >  0) {
        $data = $sql->fetchAll();
         
        foreach($data as $list) {
          $p = new Prospection();
          $p->setId($list['id']);
          $p->setCompanies($list['companies']);
          $p->setName($list['name']);
          $p->setEmail($list['email']);
          $p->setStatus($list['status']);

          $array[] = $p;
        }
      }

      return $array;
    }
    
    /**
     * Método responsavel por verificar se há duplicidade de dados 
     */
    public function verification($email, $companies){
      $sql = $this->pdo->prepare("SELECT * FROM prospection WHERE email = :email OR companies = :companies");
      $sql->bindValue(':email', $email);
      $sql->bindValue(':companies', $companies);
      $sql->execute();
      if($sql->rowCount() > 0){
         $data = $sql->fetch();

         $p = new Prospection();
         $p->setId($data['id']);
         $p->setCompanies($data['companies']);
         $p->setName($data['name']);
         $p->setEmail($data['email']);
         $p->setPhone($data['phone']);
         $p->setNotes($data['notes']);
         $p->setStatus($data['status']);
         
         return $p;


      } else {
        return false;
      }


    }public function findById($id){
      $sql = $this->pdo->prepare("SELECT * FROM prospection WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
      if($sql->rowCount() > 0){
          $data = $sql->fetch();
  
          $p = new Prospection();
          $p->setId($data['id']);
          $p->setCompanies($data['companies']);
          $p->setName($data['name']);
          $p->setEmail($data['email']); // Verificação para o campo email
          if (isset($data['phone'])) { // Verificação para o campo phone
              $p->setPhone($data['phone']);
          }
          if (isset($data['notes'])) { // Verificação para o campo notes
              $p->setNotes($data['notes']);
          }
          $p->setStatus($data['status']);
          
          return $p;
      } else {
          return false;
      }
  }

  

    public function update(Prospection $p){
     $sql = $this->pdo->prepare("UPDATE prospection SET companies = :companies, name = :name, email = :email, phone = :phone, notes = :notes, status = :status WHERE id = :id");
     $sql->bindValue(':companies', $p->getCompanies());
     $sql->bindValue(':name', $p->getName());
     $sql->bindValue(':email', $p->getEmail());
     $sql->bindValue(':phone', $p->getPhone());
     $sql->bindValue(':notes', $p->getNotes());
     $sql->bindValue(':status', $p->getStatus());
     $sql->bindValue(':id', $p->getId());
     $sql->execute();

     return true;


    }

    public function delete($id){
      $sql = $this->pdo->prepare("DELETE FROM prospection WHERE id = :id");
      $sql->bindValue('id', $id);
      $sql->execute();   
    }
}