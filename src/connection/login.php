<?php
namespace src\connection;
use src\utilisateurs\User;
use src\utilisateurs\Admin;

class login{

    private $db;
    private $mail;
    private $password ="";

    public function __construct(\PDO $db){
        $this->db = $db;
    }
     public function connection($email, $password){
            $request = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($request);
            $stmt->execute(["email" => $email]);
            $usermail = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($usermail && password_verify($password, $usermail['password'])){
               if(session_status() == PHP_SESSION_NONE){
                   session_start();
               }
               $_SESSION['pseudo'] = $usermail['pseudo'];
               $_SESSION['role'] = $usermail['role'];

               if($usermail['role'] === "ROLE_ADMIN"){
                   $currentUser = new Admin();
                   $currentUser->setPseudo($usermail['pseudo']);
               }else {
                   $currentUser = new User();
                   $currentUser->setPseudo($usermail['pseudo']);
               }
               echo "Connecté en tant que " . $currentUser->getPseudo() . "<br>";
            }
     }
}