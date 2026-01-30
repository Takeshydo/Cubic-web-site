<?php

namespace web\src\utilisateurs;

class UserStructure{
    private $id;
    private $pseudo;
    private $mail;
    private $password;
    private $role = "ROLE_USER";

    /*Getter*/
    public function getID()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    /*Setter*/
    public function setID($id)
    {
        return $this->id = $id;
    }

    public function setRole($role)
    {
        return $this->role = $role;
    }

    public function setMail($mail)
    {
        return $this->mail = $mail;
    }

    public function setPseudo($pseudo)
    {
        return $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        return $this->password = $password;
    }
}