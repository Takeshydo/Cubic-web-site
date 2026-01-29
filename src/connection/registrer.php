<?php
class registrer{
    private $db;
    private $pseudo;
    private $email;
    private $password;

    function __construct(\PDO $db){
        $this->db = $db;
    }

    public function registrer(user  $user){
        $psswdHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $request = "INSERT INTO login(pseudo, email, password) VALUES (:pseudo, :email, :psswdHash)";
        $stmt = $this->db->prepare($request);
        $stmt->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getMail(),
            'psswdHash' => $psswdHash,
        ]);
    }
}