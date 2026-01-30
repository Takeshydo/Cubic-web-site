<?php
namespace src\connection;

use src\utilisateurs\User;

class registrer{
    private $db;
    private $pseudo;
    private $email;
    private $password;

    function __construct(\PDO $db){
        $this->db = $db;
    }

    public function registrer(User $user){
        $psswdHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $request = "INSERT INTO users(pseudo, email, password, role) VALUES (:pseudo, :email, :psswdHash, :role)";
        $stmt = $this->db->prepare($request);
        $stmt->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getMail(),
            'psswdHash' => $psswdHash,
            'role' => $user->getRole()
        ]);

    }
}