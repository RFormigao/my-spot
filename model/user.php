<?php

class user
{
    private $iduser;
    private $user;
    private $password;
    private $email;
    private $name;
    private $lastname;
    
    public function __construct($iduser='', $user='', $password='', $email='', $name='', $lastname='')
    {
        $this->iduser = $iduser;
        $this->user = $user;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->lastname = $lastname;
    }

    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    
    


}