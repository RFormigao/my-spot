<?php

class address
{
    private $idaddress;
    private $user;
    private $address;
    private $latitude;
    private $longitude;
    private $nickname;
    
    public function __construct($idaddress='', $user='', $address='', $latitude='', $longitude='', $nickname='')
    {
        $this->idaddress = $idaddress;
        $this->user = $user;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->nickname = $nickname;
    }

    public function getidAddress()
    {
        return $this->idaddress;
    }

    public function setidAddress($idaddress)
    {
        $this->idaddress = $idaddress;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }
    
    


}