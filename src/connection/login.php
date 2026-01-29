<?php
namespace src\connection;
class login{

    private $db;
    private $mail;
    private $password ="";

    public function __construct(\PDO $db){
        $this->db = $db;
    }
     public function connection($email, $password){
            $request = "SELECT * FROM login WHERE email = :email";
            $stmt = $this->db->prepare($request);
            $stmt->execute(["email" => $email]);
            $usermail = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($usermail && password_verify($password, $usermail['password'])){
                echo "Connecté a la session";
            }
     }

     /*
    public function getAllUser(){
        $allUsers = [];
        $request = "SELECT * FROM login ORDER BY id DESC";
        $stmt = $this->db->query($request);
        $dataAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dataAll as $dataOne){
            $user = new User();
            $user->setID($dataOne['ID']);
            $user->setPseudo($dataOne['pseudo']);
            $user->setMail($dataOne['email']);
            $user->setRole($dataOne['role']);
            $allUsers[] = $user;
        }
        return $allUsers;
    }
     */
}