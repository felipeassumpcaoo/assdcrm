<?php

class Prospection {
     private $id;
     private $companies;
     private $name;
     private $phone;
     private $email;
     private $notes;
     private $status;
     

     public function getId(){
        return $this->id;
     }

     public function setId($i) {
        $this->id = $i;
     }

     public function getCompanies() {
        return $this->companies;
     }

     public function setCompanies($companies){
          $this->companies = ucwords($companies);
     }

     public function getName() {
        return $this->name;
     }

     public function setName($name){
          $this->name = ucwords($name);
     }
     

     public function getPhone() {
        return $this->phone;
     }

     public function setPhone($phone){
          $this->phone = $phone;
     }


     public function getEmail() {
        return $this->email;
     }


     public function setEmail($email){
          $this->email = strtolower(trim($email));
     }

     public function getNotes() {
        return $this->notes;
     }
     

     public function setNotes($notes){
          $this->notes = $notes;
     }

     public function getStatus() {
        return $this->status;
     }
     

     public function setStatus($status){
          $this->status = $status;
     }


}

interface ProspectionDAO {
    public function add( Prospection $p);
    public function findALL();
    public function findById($id);
    public function update(Prospection $p);
    public function delete($id);
}   