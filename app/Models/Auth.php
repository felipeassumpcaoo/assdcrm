<?php
require_once 'app/dao/UserDaoMysql.php';
class Auth {
   
   private $pdo;
   private $base;
   private $dao;

    /**
     *Método por verificar o banco de dados
     */
    public function __construct(PDO $pdo, $base) {
         $this->pdo = $pdo;
         $this->base = $base;
         $this->dao = new UserDaoMysql($this->pdo);
    }

   /**
    * Método responsavél por checar o token do usuário
    */
   public function checkToken() {
      if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            
            $user = $this->dao-> findByToken($token);
            if($user) {
                return $user;
            }
            
      }

     header("Location: ".$this->base."login.php");
     exit;
  
   
      }

      /**
       * Método responsavel por verificar a validação do Login
       */

       public function validateLogin($email, $password) {
         $user = $this->dao->findByEmail($email);
         if($user) {
            

            if(password_verify($password, $user->password)) {
          
              $token = md5(time().rand(0,9999));

                 $_SESSION['token'] = $token;
                 $user->token = $token;
                 $this->dao->update($user);

                 return true;
            }
         }
         
         return false;

       }


       /**
        * Método responsavel para verificar se o email já existe no sistema;
        */
       public function emailExists($email) {
          return  $this->dao->findByEmail($email) ? true : false;

        }
        
        
        /**
         * Método responsavel por registrar o usuário
         */

        public function registerUser($name, $email, $password) {
      
             // Gerando o hash do password; 
              $hash = password_hash($password, PASSWORD_DEFAULT);

              //Gerando o token 
              $token = md5(time().rand(0,9999));

                $newUser = new User();
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->password = $hash;
                $newUser->token = $token; 
                
                //Inserindo o usuário
                $this->dao->insert($newUser);

        
                $_SESSION['token'] = $token;
        }

   }