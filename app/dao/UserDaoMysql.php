<?php

require_once 'app/Models/User.php';


/**
 * 
 */
class UserDaoMysql implements UserDAO {
  private $pdo;

/**
 * Metódo responsavél por fazer consulta no banco de dados;
 *  
 */

  public function __construct(PDO $driver) {
       $this->pdo = $driver;

  }


  /**
   * Método responsavel para gerar um novo usuário;
   */

  private function generateUser($array) {
      $u = new User();
      $u->id = $array['id'] ?? 0;
      $u->name = $array['name'] ?? '';
      $u->email = $array['email'] ?? '';
      $u->password = $array['password'] ?? '';
      $u->token = $array['token'] ?? '';
      
      return $u;

  }

  public function findByToken($token) {
    if(!empty($token)) {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
        $sql->bindValue(':token', $token);
        $sql->execute();

        if($sql->rowCount() > 0 ) {
           $data = $sql->fetch(PDO::FETCH_ASSOC);
           $user = $this->generateUser($data);
           return $user;

        }
    }
     
     return false;

  }


  public function findByEmail($email) {
    if(!empty($email)) {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0 ) {
           $data = $sql->fetch(PDO::FETCH_ASSOC);
           $user = $this->generateUser($data);
           return $user;

        }
    }
     
     return false;

  }

  public function update(User $u) {
     $sql = $this->pdo->prepare("UPDATE users SET  
        email = :email,
        password = :password,
        token = :token,
        id = :id
        WHERE id = :id");
        
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        
        $sql->execute();

        return true;

  }
  

  public function insert(User $u) {
     $sql = $this->pdo->prepare("INSERT INTO users(
       name,email,password,token
     ) VALUES(
         :name,:email,:password,:token
     )");

     $sql->bindValue(':name',$u->name);
     $sql->bindValue(':email',$u->email);
     $sql->bindValue(':password',$u->password);
     $sql->bindValue(':token',$u->token);
     $sql->execute();

     return true;

  }
  
  

}